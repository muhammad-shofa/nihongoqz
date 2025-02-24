<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PagesController::index');
$routes->get('/hiragana-test', 'PagesController::hiragana');
$routes->get('/katakana-test', 'PagesController::katakana');

// Kana routes
$routes->get('/api/hiragana', 'HiraganaController::index');
