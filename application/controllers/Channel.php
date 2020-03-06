<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Channel extends CI_Controller{

    private $fifo = "/var/www/sr/_gen/streamingriver";

    function __construct()
    {
        parent::__construct();
        $this->load->model('Channel_model');
    } 

    /*
     * Listing of channels
     */
    function index()
    {
        $sort = null!==$this->input->get('sort')?$this->input->get('sort'):'id';
        $type = null!==$this->input->get('type')?$this->input->get('type'):'asc';
        $data['channels'] = $this->Channel_model->get_all_channels($sort,$type);

        $this->load->model('Package_model');
        $data['packages'] = $this->Package_model->get_all_packages();

        $this->load->model('Channels_package_model');
        $data['cp'] = $this->Channels_package_model->get_compact();
        
        $data['_view'] = 'channel/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new channel
     */
    function add()
    {   
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('stream_url','Stream Url','required');
        if(config_item("gui.can_edit_channel_url")) {
            $this->form_validation->set_rules('url','Url','required');
        }
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'name' => htmlspecialchars($this->input->post('name')),
                'stream_url' => trim(str_replace("'",'',str_replace('"','',escapeshellcmd($this->input->post('stream_url'))))),
                'epg1' => htmlspecialchars($this->input->post('epg1')),
                'ffmpeg'=>$this->input->post('ffmpeg')

            );

            if(config_item("gui.can_edit_channel_url")) {
                $params['url'] = $this->input->post("url");
            } else {
                $params['url'] = substr(sha1($this->input->post('name').time()), 0, 16);
            }

            
            $channel_id = $this->Channel_model->add_channel($params);
            $this->update(false);
            redirect('channel/index');
        }
        else
        {            
            $data['_view'] = 'channel/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a channel
     */
    function edit($id)
    {   
        // check if the channel exists before trying to edit it
        $data['channel'] = $this->Channel_model->get_channel($id);
        
        if(isset($data['channel']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('stream_url','Stream Url','required');
            if(config_item("gui.can_edit_channel_url")) {
                $this->form_validation->set_rules('url','Url','required');
            }
        
            if($this->form_validation->run())     
            {   
                $params = array(
                    'name' => htmlspecialchars($this->input->post('name')),
                    'stream_url' => trim(str_replace("'",'',str_replace('"','',escapeshellarg($this->input->post('stream_url'))))),
                    'epg1' => htmlspecialchars($this->input->post('epg1')),
                    'ffmpeg'=>$this->input->post('ffmpeg')
                );
                if(config_item("gui.can_edit_channel_url")) {
                    $params['url'] = escapeshellcmd($this->input->post("url"));
                }

                $this->Channel_model->update_channel($id,$params);            
                $this->update(false);
                redirect('channel/index');
            }
            else
            {
                $data['_view'] = 'channel/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The channel you are trying to edit does not exist.');
    } 

    /*
     * Deleting channel
     */
    function remove($id)
    {
        $channel = $this->Channel_model->get_channel($id);

        // check if the channel exists before trying to delete it
        if(isset($channel['id']))
        {
            $this->load->model('Channels_package_model');
            $this->Channels_package_model->delete_channels_package($id);
            $this->Channel_model->delete_channel($id);
            redirect('channel/index');
        }
        else
            show_error('The channel you are trying to delete does not exist.');
    }
    
    public function restart($ch) {
        $ch = escapeshellarg($ch);
        $cmd = sprintf("restart %s", $ch);
        $this->_fifo_send($cmd);
        redirect("channel");

    }

    public function update($redirect=true) {
        $dir = sprintf("%s%s", "/var/www/sr/_gen/", "");
        $items = $this->Channel_model->get_all_channels('id', 'asc');
        $output = '';
        $ffmpegoutput = '';
        foreach($items as $item) {
            if($item['ffmpeg'] == 1) {
                $output .= sprintf("%s %s\n",$item['url'], sprintf("http://localhost:9005/%s/stream.m3u8", $item['url']));
                $ffmpegoutput .= sprintf("%s %s\n", $item['url'], $item['stream_url']);
            } else {
                $output .= sprintf("%s %s\n", $item['url'], $item['stream_url']);
            }

        }
        file_put_contents($dir."ffmpeg2.txt", $output);
        file_put_contents($dir."ffmpeg.txt", $ffmpegoutput);



        $this->_fifo_send("cmd2");

        if($redirect) redirect('channel');
    }

    private function _fifo_send($cmd) {
        $h = fopen($this->fifo, "w"); 
        stream_set_blocking($h,false);
        fwrite($h, sprintf("%s\n", $cmd));
        fclose($h);
    }
}
