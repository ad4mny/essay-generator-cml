<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'LoginController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'LoginController/loginUser';
$route['(:any)'] = 'SystemController/index/$1';
$route['vocabulary/submit'] = 'SystemController/addNewVocab';

// API Request
$route['api/login'] = 'RestController/loginUser';
$route['api/register'] = 'RestController/registerUser';

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
$route['api/delete_outline'] = 'RestController/deleteOutline';
$route['api/submit_outline'] = 'RestController/submitOutline';
