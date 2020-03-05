<?php

class Dashboard extends CI_Controller {
  public function index() {
    $this->laad->view('webtv/index');
  }
}
