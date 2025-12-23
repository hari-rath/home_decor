<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('contact', 'Home::contact');
$routes->get('getadd', 'Home::addcontact');

$routes->get('admin/dashboard', 'Admin\Dashboard::index');

 $routes->get('admin/product', 'Admin\Product::index');
 $routes->match(['get','post'], 'admin/product/add', 'Admin\Product::add');
 $routes->match(['get','post'], 'admin/product/edit/(:num)', 'Admin\Product::edit/$1');
 $routes->match(['get','post'], 'admin/product/delete/(:num)', 'Admin\Product::delete/$1');
 

 $routes->match(['get','post'], 'admin/product/delete_gallery_img', 'Admin\product::delete_gallery_img');
 $routes->match(['get','post'], 'admin/product/delete_primary_img', 'Admin\product::delete_primary_img');


 $routes->get('admin/category', 'Admin\Category::index');
 $routes->match(['get','post'], 'admin/category/add', 'Admin\Category::add');
 $routes->match(['get','post'], 'admin/category/edit/(:num)', 'Admin\Category::edit/$1');
 $routes->match(['get','post'], 'admin/category/delete/(:num)', 'Admin\Category::delete/$1');


 // Admin Auth
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login-process', 'Admin\Auth::loginProcess');
$routes->get('admin/logout', 'Admin\Auth::logout');






