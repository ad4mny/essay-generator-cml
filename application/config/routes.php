<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'LoginController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['api/login'] = 'LoginController/loginAPI';
$route['api/register'] = 'LoginController/registerAPI';
$route['api/create_group'] = 'RestController/createGroupAPI';
$route['api/get_group'] = 'RestController/getGroupAPI';
