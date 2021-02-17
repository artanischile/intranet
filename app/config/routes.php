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
$route['default_controller'] = 'frontend/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['mision'] = '/frontend/home/mision';
$route['quienes-somos'] = '/frontend/home/quienes';
$route['nuestras-marcas'] = '/frontend/brands';
$route['unete-al-equipo'] = '/frontend/home/unete';

$route['trabaja-con-nosotros'] = '/frontend/home/works';
    
$route['noticias'] = '/frontend/news/index';

//productos 
$route['productos/buscar'] = '/frontend/products/search';
$route['productos/buscar/(:any)/(:any)'] = '/frontend/products/search/$1/$2';

$route['productos/checkout'] = '/frontend/products/checkout';
$route['productos/checkout/envio'] = '/frontend/products/place_order_thank';
$route['productos/solcitar'] = '/frontend/products/placeOrder';

$route['productos/agregar'] = '/frontend/products/add_to_cart';
$route['productos/carro'] = '/frontend/products/show_the_cart';
$route['productos/carro/eliminaritem/(:any)'] = '/frontend/products/delete_cart/$1';
$route['productos/carro/eliminar'] = '/frontend/products/Eliminate_cart';
$route['productos/carro/actualiza'] = '/frontend/products/update_cart';




$route['productos/details/(:any)'] = '/frontend/products/details/$1';


$route['productos'] = '/frontend/products/index/ ';
$route['productos/(:any)'] = '/frontend/products/list_product/$1';
$route['productos/(:any)/(:any)'] = '/frontend/products/list_products/$1/$2';
$route['productos/(:any)/(:any)/(:any)'] = '/frontend/products/list_products/$1/$2/$3';
$route['productos/(:any)/(:any)/(:any)/(:any)'] = '/frontend/products/list_products/$1/$2/$3/$4';



$route['clientes/mi-cuenta'] = '/frontend/customers/account';
$route['clientes/mis-ordenes'] = '/frontend/customers/orders';
$route['clientes/mis-ordenes/detalle/(:any)'] = '/frontend/customers/orders_details/$1';

$route['clientes/mi-cuenta/actualizar'] = '/frontend/customers/updateCustomer';
$route['clientes'] = '/frontend/customers/index';

$route['clientes/registro'] = '/frontend/customers/register';
$route['clientes/comuna'] = '/frontend/customers/ajaxCommune';


$route['clientes/login'] = '/frontend/customers/login';
$route['clientes/registro/guardar'] = '/frontend/customers/save_register';
$route['clientes/cerrar'] = '/frontend/customers/logout';


$route['jekyll'] = '/frontend/landing/jekill';
$route['new-jekyll'] = '/frontend/landing/new_jekill';
$route['trigger'] = '/frontend/landing/trigger';
$route['scalpel'] = '/frontend/landing/scalpel';
$route['super-six-evo'] = '/frontend/landing/supersixevo';
$route['synapse'] = '/frontend/landing/synapse';
$route['force'] = '/frontend/landing/force';
$route['cannondale-fsi'] = '/frontend/landing/cannondale_fsi';
$route['sensor'] = '/frontend/landing/sensor';
$route['new-scalpel-si'] = '/frontend/landing/si';
$route['systemsix'] = '/frontend/landing/systemsix';


$route['jekill/registro'] = '/frontend/landing/save';





$route['dashboard'] = '/backend/Dashboard';


$route['bo'] = "backend/login";
$route['bo/logout'] = "backend/login/Logout";
$route['bo/(:any)'] = "backend/$1";
$route['bo/(:any)/(:any)'] = "backend/$1/$2";
$route['bo/(:any)/(:any)/(:any)'] = "backend/$1/$2/$3"; //probando
