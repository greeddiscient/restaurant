<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['menus'] = 'Main/menus';
$route['newOrder'] = 'Main/newOrder';
$route['todaysOrder'] = 'Main/todaysOrder';
$route['allOrders'] = 'Main/allOrder';
$route['customers'] = 'Main/customers';
