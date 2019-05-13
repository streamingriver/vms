<?php

$route['tokens'] = 'client/apis/tokens';

$route['ii1/register/(:any)'] = 'client/apis/register/$1';
$route['ii1/channel/(:any)/(:any)'] = 'client/apis/channel/$1/$2';
