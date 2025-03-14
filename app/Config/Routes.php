<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PagesController::index');
// Pages controller
$routes->get('/hiragana-test', 'PagesController::hiragana');
$routes->get('/katakana-test', 'PagesController::katakana');
$routes->get('/hiragana-test/result', 'PagesController::hiraganaResult');
// $routes->get('/katakana-test/result', 'PagesController::katakanaResult');
$routes->get('/login', 'PagesController::login');
$routes->get('/register', 'PagesController::register');

// Kana routes
$routes->get('/api/hiragana', 'HiraganaController::index');
$routes->get('/api/result', 'Hiragana::result'); // digunakan untuk mengambil data result dari database (user sudah login)

// register & login
$routes->post('/api/auth/register', 'UserController::register');
$routes->post('/api/auth/login', 'UserController::login');
$routes->get('/api/auth/logout', 'UserController::logout');

// session routes
$routes->get('/get-session', 'UserController::getSession');

// save result test
$routes->post('/save-result-test', 'ResultController::saveResultTest');
