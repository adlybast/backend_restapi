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
|	http://codeigniter.com/user_guide/general/routing.html
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


$route['auth/login']['post']           		= 'auth/login';
$route['auth/logout']['post']          		= 'auth/logout';

$route['student']['get']          	       	= 'student';
$route['student/detail/(:num)']['get']    	= 'student/detail/$1';
$route['student/create']['post']   	  		= 'student/create';
$route['student/update/(:num)']['put']    	= 'student/update/$1';
$route['student/delete/(:num)']['delete'] 	= 'student/delete/$1';


// $route['student']['get']          	= 'student';
// $route['student/(:num)']['get']    	= 'student/$1';
// $route['student']['post']   	   	= 'student';
// $route['student/(:num)']['put']    	= 'student/$1';
// $route['student/(:num)']['delete'] 	= 'student/$1';

$route['class']['get']          			= 'class';
$route['class/detail/(:num)']['get']    	= 'class/detail/$1';
$route['class/create']['post']   	 	 	= 'class/create';
$route['class/update/(:num)']['put']    	= 'class/update/$1';
$route['class/delete/(:num)']['delete'] 	= 'class/delete/$1';

$route['student/(:num)/class']['put'] 		= 'student/$1/class';
$route['student/(:num)/class']['delete'] 	= 'student/$1/class';

$route['']

$route['default_controller'] 				= 'welcome';
$route['404_override'] 						= '';
$route['translate_uri_dashes'] 				= FALSE;
