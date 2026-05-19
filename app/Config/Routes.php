<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');           // Halaman Depan
$routes->post('/book', 'Home::book');       // Proses Booking

// Login & Logout
$routes->get('/login', 'Auth::login');
$routes->post('/login/auth', 'Auth::process');
$routes->get('/logout', 'Auth::logout');

// Halaman Admin (Harus Login)
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('dashboard', 'Admin::index');
    $routes->post('transaction/add', 'Admin::add_transaction');
    $routes->get('reservations', 'Admin::reservations'); // Tambahan jika nanti buat fitur reservasi
});