<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Authentication Routes
$routes->post('/login', 'AuthController::login');
$routes->post('/register', 'AuthController::register');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/login', 'AuthController::showLoginForm');
$routes->get('/register', 'AuthController::showRegisterForm');
$routes->get('/verify-email', 'AuthController::showVerifyForm');
$routes->post('/verify-email', 'AuthController::verifyCode');

// Pelanggan Routes
$routes->get('/', 'Home::index');
$routes->get('/kapsters', 'KapsterController::index');
$routes->get('/layanan', 'LayananController::index');
$routes->get('/galeri/(:num)', 'GaleriController::show/$1');
$routes->get('/galeri', 'GaleriController::index');

//Contact Us
$routes->get('/contact', 'Home::contact');
$routes->post('/contact/send', 'Home::sendMessage');

// Chatbot Routes
$routes->post('/api/chatbot/message', 'ChatbotController::sendMessage');

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('booking/new', 'BookingController::new');
    $routes->post('booking/create', 'BookingController::create');
    $routes->get('my-bookings', 'BookingController::index');
});

// Admin & Kapster Routes (Protected)
$routes->group('dashboard', ['filter' => 'admin'], static function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index');
});


$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    //Kapster Routes
    $routes->get('kapsters', 'Admin\KapsterController::index');
    $routes->get('kapsters/new', 'Admin\KapsterController::new');
    $routes->post('kapsters/create', 'Admin\KapsterController::create');
    $routes->get('kapsters/edit/(:num)', 'Admin\KapsterController::edit/$1');
    $routes->post('kapsters/update/(:num)', 'Admin\KapsterController::update/$1');
    $routes->post('kapsters/delete/(:num)', 'Admin\KapsterController::delete/$1');

    //Booking Routes
    $routes->get('bookings', 'Admin\BookingController::index');
    $routes->post('bookings/update-status/(:num)', 'Admin\BookingController::updateStatus/$1');

    //Layanan Routes
    $routes->get('layanan', 'Admin\LayananController::index');
    $routes->get('layanan/new', 'Admin\LayananController::new');
    $routes->get('layanan/fetch/(:num)', 'Admin\LayananController::fetch/$1');
    $routes->post('layanan/create', 'Admin\LayananController::create');
    $routes->get('layanan/edit/(:num)', 'Admin\LayananController::edit/$1');
    $routes->post('layanan/update/(:num)', 'Admin\LayananController::update/$1');
    $routes->post('layanan/delete/(:num)', 'Admin\LayananController::delete/$1');

    //Galeri Routes
    $routes->get('galeri', 'Admin\GaleriController::index');
    $routes->get('galeri/new', 'Admin\GaleriController::new');
    $routes->post('galeri/create', 'Admin\GaleriController::create');
    $routes->get('galeri/edit/(:num)', 'Admin\GaleriController::edit/$1');
    $routes->post('galeri/update/(:num)', 'Admin\GaleriController::update/$1');
    $routes->post('galeri/delete/(:num)', 'Admin\GaleriController::delete/$1');

    // Routes for Kapsters to add their records
    $routes->get('catatan-cukur', 'Admin\TransaksiCukurController::index');
    $routes->get('catatan-cukur/new', 'Admin\TransaksiCukurController::new');
    $routes->post('catatan-cukur/create', 'Admin\TransaksiCukurController::create');
    $routes->get('catatan-cukur/edit/(:num)', 'Admin\TransaksiCukurController::edit/$1');
    $routes->post('catatan-cukur/update/(:num)', 'Admin\TransaksiCukurController::update/$1');
    $routes->post('catatan-cukur/delete/(:num)', 'Admin\TransaksiCukurController::delete/$1');

    // Route specifically for Admins to view the main report
    $routes->get('laporan-cukur', 'Admin\TransaksiCukurController::laporan', ['filter' => 'admin_only']);
    $routes->get('laporan-cukur/export/(:alpha)', 'Admin\TransaksiCukurController::export/$1', ['filter' => 'admin_only']);
});
