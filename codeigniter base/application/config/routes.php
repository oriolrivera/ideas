<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

#$route['default_controller'] = "welcome";
#$route['404_override'] = '';

$route['default_controller'] = 'frontend/index';
$route['404_override'] = 'backend/error404';

/* Rutas para Frontend y Backend */
$route['backend'] = 'backend/panel';
$route['backend/(:any)'] = 'backend/$1';
$route['(:any)'] = 'frontend/$1';


$route['contact'] = 'frontend/index/contact';
$route['frontend/page/index/(:any)'] = 'frontend/page/index/$1';

$route['backend/login'] = 'backend/panel/login';
$route['backend/logout'] = 'backend/panel/logout';


/*$route['backend/pageinfo'] = 'backend/panel/pageinfo';
$route['backend/addpageinfo'] = 'backend/panel/addpageinfo';
$route['backend/addmenu'] = 'backend/menu/addmenu';
$route['backend/addcategori'] = 'backend/categori/addcategori';
$route['backend/managermenu'] = 'backend/menu/managermenu';
$route['backend/managercategori'] = 'backend/categori/managercategori';
$route['backend/managerconfig'] = 'backend/setting/managerconfig';
$route['backend/addusersystem'] = 'backend/panel/addusersystem';
$route['backend/managerslider'] = 'backend/slider/managerslider';
$route['backend/addslider'] = 'backend/slider/addslider';


$route['sitemap.xml'] = 'sitemap/index';*/



/* End of file routes.php */
/* Location: ./application/config/routes.php */