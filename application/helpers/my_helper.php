<?php

function get_full_host() {
	$proto = "https"; if($_SERVER['HTTP_PORT'] == 80 || !isset($_SERVER['HTTPS'])) $proto = 'http';
	return sprintf("%s://%s", $proto, $_SERVER['HTTP_HOST']);
}


function list_modules() {
  $dir = sprintf("%s/modules",APPPATH);
  $modules = array();
  if ($handle = opendir($dir)) {
      $blacklist = array('.', '..', '.gitkeep');
      while (false !== ($file = readdir($handle))) {
          if (!in_array($file, $blacklist)) {
              $modules[] = array('name'=>str_replace("_", " ", ucfirst($file)), 'url'=>$file);
          }
      }
      closedir($handle);
  }
  return $modules;
}
