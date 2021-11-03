<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'LoginController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['api/login'] = 'LoginController/loginAPI';
$route['api/register'] = 'LoginController/registerAPI';

// Group API Request
$route['api/get_user_group'] = 'RestController/getUserGroup';
$route['api/get_student_list'] = 'RestController/getStudentList';
$route['api/get_group_list'] = 'RestController/getGroupList';
$route['api/join_group'] = 'RestController/joinGroup';
$route['api/create_group'] = 'RestController/createGroup';
$route['api/add_member'] = 'RestController/addMember';
$route['api/leave_group'] = 'RestController/leaveGroup';

$route['api/submit_title'] = 'RestController/submitEssayTitle';
$route['api/get_vocabulary'] = 'RestController/getVocabulary';
$route['api/set_vocabulary'] = 'RestController/setVocabulary';
$route['api/get_submission'] = 'RestController/getSubmission';
$route['api/get_outline'] = 'RestController/getOutline';
$route['api/submit_outline'] = 'RestController/submitOutline';
