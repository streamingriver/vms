<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['tokens'] = 'apis/tokens';
$route['apis/ii1/register/(:any)'] = 'apis/register/$1';
$route['apis/ii1/channel/(:any)/(:any)'] = 'apis/channel/$1/$2';

$route['default_controller'] = 'dashboard/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
