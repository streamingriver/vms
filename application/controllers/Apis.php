<?php

class Apis extends CI_Controller {
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
            $response[$item['token']] = "true";
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function register($hash) {
        if(!$client = $this->Client_model->get_client_by_hash($hash)) {
            show_404();
        }
        $channels = $this->Channel_model->by_package_id($client['package_id']);

        header('Content-Type: text/plain');
        printf("#EXTM3U\n");
        foreach($channels as $channel) {
            printf('#EXTINF:-1 tvg-id="%s",%s'."\n", $channel['name'], $channel['name']);
            printf("%s%s\n",config_item('host'), site_url(sprintf("/apis/ii1/channel/%s/%s", $hash, $channel['url'])));
        }
    }

    public function channel($hash, $channel) {
        if(!$client = $this->Client_model->get_client_by_hash($hash)) {
            show_404();
        }

        header('Content-Type: text/plain');
        printf("#EXTM3U\n");
        printf("#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=2024000\n");
        printf("%s/streams/%s/stream.m3u8?token=%s\n", config_item('host'), $channel, $hash);

    }
}
