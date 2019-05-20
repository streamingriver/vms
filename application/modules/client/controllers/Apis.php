<?php


class Apis extends MX_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Package_model');
        $this->load->model('Channel_model');
        $this->load->model('Client_model');
    }

    
    public function tokens() {
        if($this->input->get("token") == "" || $this->input->get("token") != config_item("token")) {
            show_404();
        }
        $items = $this->Client_model->get_all_clients();

        $response = array();
        foreach($items as $item) {
            $response['addr'][$item['addr']] = true;
            $response['ip'][$item['token']] = $item['addr'];
            $response['ch'][$item['token']] = $item['ch'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function register($hash) {
        if(!$client = $this->Client_model->get_client_by_hash($hash)) {
            show_404();
        }
        if(!$client['active']) {
            show_404();
        }

        $this->Client_model->update_client(
            $client['id'],
            array('addr'=>$_SERVER['REMOTE_ADDR'])
        );

        @file_get_contents("http://127.0.0.1:8000/reload");

        $channels = $this->Channel_model->by_package_id($client['package_id']);

        header('Content-Type: text/plain');
        printf("#EXTM3U\n");
        foreach($channels as $channel) {
            printf('#EXTINF:-1 tvg-id="%s",%s'."\n", $channel['epg1'], $channel['name']);
            printf("%s%s\n",get_full_host(), site_url(sprintf("/apis/ii1/channel/%s/%s", $hash, $channel['url'])));
        }
    }

    public function channel($hash, $channel) {
        if(!$client = $this->Client_model->get_client_by_hash($hash)) {
            show_404();
        }
        if(!$client['active']) {
            show_404();
        }

        if($client['addr'] != $_SERVER['REMOTE_ADDR']) {
            show_404();
        }

        $this->Client_model->update_client(
            $client['id'],
            array('ch'=>$channel)
        );

        @file_get_contents("http://127.0.0.1:8000/reload");

        header('Content-Type: text/plain');
        printf("#EXTM3U\n");
        printf("#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=2024000\n");
        printf("%s/streams/%s/stream.m3u8?token=%s\n", get_full_host(), $channel, $hash);

    }
}
