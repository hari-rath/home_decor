<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- PUBLIC ROUTES (No login required) ---
$routes->get('/', 'Home::index');
$routes->get('contact', 'Home::contact');
$routes->get('all_gallaries', 'Home::all_gallaries');
$routes->get('services', 'Home::services');
$routes->get('category_wise_products/(:num)', 'Home::category_wise_products/$1');
$routes->get('product_details/(:num)', 'Home::product_details/$1');
$routes->post('savecontact', 'Home::add_contact');
$routes->get('getadd', 'Home::addcontact');

// --- ADMIN AUTH ROUTES (Must be accessible to login) ---
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login-process', 'Admin\Auth::loginProcess');
$routes->get('admin/logout', 'Admin\Auth::logout');
$routes->match(['get', 'post'],'admin/auth/change_password', 'Admin\Auth::change_password');

// --- PROTECTED ADMIN ROUTES (Requires Login) ---
// We apply the 'auth' filter here so everything inside this group is locked.
$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth'], function($routes) {
    
    // Dashboard
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('contact_list', 'Contact::index');
    $routes->match(['get', 'post'], 'contact/delete/(:num)', 'Contact::delete/$1');
    $routes->match(['get', 'post'], 'gallaries', 'Gallaries::index');
    $routes->match(['get', 'post'], 'gallaries/add', 'Gallaries::add');
    $routes->match(['get', 'post'], 'gallaries/delete/(:num)', 'Gallaries::delete/$1');

    // Products
    $routes->group('product', function($routes) {
        $routes->get('/', 'Product::index');
        $routes->match(['get', 'post'], 'add', 'Product::add');
        $routes->match(['get', 'post'], 'edit/(:num)', 'Product::edit/$1');
        $routes->match(['get', 'post'], 'delete/(:num)', 'Product::delete/$1');
        
        // Image Management
        $routes->match(['get', 'post'], 'delete_gallery_img', 'Product::delete_gallery_img');
        $routes->match(['get', 'post'], 'delete_primary_img', 'Product::delete_primary_img');
    });

    // Categories
    $routes->group('category', function($routes) {
        $routes->get('/', 'Category::index');
        $routes->match(['get', 'post'], 'add', 'Category::add');
        $routes->match(['get', 'post'], 'edit/(:num)', 'Category::edit/$1');
        $routes->match(['get', 'post'], 'delete/(:num)', 'Category::delete/$1');
    });
});