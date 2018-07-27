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
$route['default_controller'] = 'user';
$route['user/login'] = 'user/load_page/login';
$route['user/register'] = 'user/load_page/register';
$route['user/forgot-pass'] = 'user/load_page/forgot';
$route['authenticate'] = 'user/authenticate';
$route['registration'] = 'user/registration';
$route['forgot-pass'] = 'user/forgot_pass';
$route['apps'] = 'gateway/load_page/apps';
$route['create_app'] = 'gateway/create_app';
$route['pricing'] = 'gateway/load_page/pricing';
$route['docs'] = 'gateway/load_page/docs';
$route['profile'] = 'gateway/load_page/profile';
$route['logout'] = 'user/logout';
$route['dashboard/(:any)'] = 'gateway/load_page/dashboard/$1';
$route['meeting/(:any)'] = 'gateway/load_page/transaction/meeting/$1';
$route['message/(:any)'] = 'gateway/load_page/transaction/message/$1';
$route['payment/(:any)'] = 'gateway/load_page/transaction/payment/$1';
$route['transactions/(:any)/(:any)'] = 'gateway/get_transactions/$1/$2';
$route['create_group/(:any)/(:any)'] = 'gateway/create_transaction/$1/$2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;