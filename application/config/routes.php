<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['accounts/demo_accounts/myaccount'] = 'demo_accounts/myaccount';
$route['accounts/real_accounts/myaccount'] = 'real_accounts/myaccount';
$route['accounts/real_accounts/request'] = 'real_accounts/request';
$route['accounts/real_accounts/step1'] = 'real_accounts/step1';
//$route['accounts/real_accounts/'] = "accounts/real_accounts/step1/$1";
$route['accounts/real_accounts/step2_1'] = 'real_accounts/step2_1';
$route['accounts/real_accounts/step2_2'] = 'real_accounts/step2_2';
$route['accounts/real_accounts/step3'] = 'real_accounts/step3';
$route['accounts/real_accounts/step4'] = 'real_accounts/step4';
$route['accounts/real_accounts/step5'] = 'real_accounts/step5';
$route['accounts/real_accounts/step6'] = 'real_accounts/step6';
$route['accounts/real_accounts/step7'] = 'real_accounts/step7';
$route['accounts/real_accounts/step8'] = 'real_accounts/step8';
$route['verification/demo_accounts/index'] = 'demo_accounts/index';
$route['verification/real_accounts/index'] = 'real_accounts/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
