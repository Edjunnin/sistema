<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/home', 'ConteudoController::index');
$routes->get('/contato', 'ConteudoController::contato');
$routes->get('/minhahab', 'ConteudoController::minhahab');
$routes->get('/minhahis', 'ConteudoController::minhahis');
$routes->get('/planofuturo', 'ConteudoController::planofuturo');

// Listagem, formulário de edição e atualização
$routes->get('conteudos', 'ConteudoController::listar');
$routes->get('conteudos/editar/(:num)', 'ConteudoController::editar/$1');
$routes->post('conteudos/atualizar/(:num)', 'ConteudoController::atualizar/$1');
