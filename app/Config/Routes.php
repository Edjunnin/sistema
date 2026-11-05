<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Rotas padrão do Shield. Mantenha se o setup já tiver incluído.
service('auth')->routes($routes);

// Rotas Publicas
$routes->get('/', 'ConteudoController::index');
$routes->get('/home', 'ConteudoController::index');
$routes->get('/contato', 'ConteudoController::contato');
$routes->get('/minhahab', 'ConteudoController::minhahab');
$routes->get('/minhahis', 'ConteudoController::minhahis');
$routes->get('/planofuturo', 'ConteudoController::planofuturo');

// Rotas que exigem autenticação por sessão
$routes->group('', ['filter' => 'session'], static function ($routes) {
 $routes->get('conteudos', 'ConteudoController::listar');
 $routes->get('conteudos/editar/(:num)', 'ConteudoController::editar/$1');
 $routes->post('conteudos/atualizar/(:num)', 'ConteudoController::atualizar/$1');
});
// Exemplo de rota exclusiva para administradores
$routes->get('admin', 'Admin\Painel::index', [
 'filter' => ['session', 'group:admin'],
]);