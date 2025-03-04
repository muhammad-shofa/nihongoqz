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

// Kana routes
$routes->get('/api/hiragana', 'HiraganaController::index');
$routes->get('/api/result', 'Hiragana::result'); // digunakan untuk mengambil data result dari database (user sudah login)

// session routes
$routes->get('/check-session/(:any)', 'SessionController::index/$1');
