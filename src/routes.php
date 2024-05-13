<?php
use core\Router;
use src\controllers\ContasPagarController;

$router = new Router();

// rota de pagina inicial 

$router->get('/', 'HomeController@index');
$router->post('/salvar', 'HomeController@add');
$router->post('/salvarMesas', 'HomeController@salvarMesas');

// rota de pagina de vendas

$router->get('/vendas', 'VendaController@index');
$router->get('/read', 'VendaController@read');

// contas a pagar

$router->get('/contaspagar', 'ContasPagarController@index');
$router->get('/contaspagarShow', 'ContasPagarController@show');
$router->post('/contaspagar', 'ContasPagarController@add');
$router->get('/contaspagar/{id}/edit', 'ContasPagarController@edit');

// mesas

$router->get('/mesa/{id}/index', 'ProdutoMesaController@index');

//////
$router->get('/cadastroDeUser', 'CadastroDeUserController@index');


//////////

$router->get('/login', 'LoginController@singnin');
$router->get('/sair', 'LoginController@sair');
$router->post('/login','LoginController@singninAction');
$router->get('/cadastro', 'LoginController@singup');