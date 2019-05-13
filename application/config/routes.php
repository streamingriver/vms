<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// include routes.php in module root if exists

$dir = sprintf("%s/modules",APPPATH);
$modules = array();
if ($handle = opendir($dir)) {
  $blacklist = array('.', '..', '.gitkeep');
  while (false !== ($file = readdir($handle))) {
      if (!in_array($file, $blacklist)) {
          $module = sprintf("%s/%s", $dir, $file);
          $routes_file = sprintf("%s/routes.php",$module);
          if(file_exists($routes_file)) {
          	require_once $routes_file;
          }
      }
  }
  closedir($handle);
}
return $modules;
