<?php

namespace src\controllers;

use \core\Controller;
use DateTimeImmutable;
use src\models\Produto;
use src\models\Venda;


class HomeController extends Controller
{

    public function __construct()
    {
        $time = 0;
        session_set_cookie_params($time);
        session_start();
        if (!isset($_SESSION['id'])) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $produto = Produto::select()->get();

        $this->render('home', [
            'produtos' => $produto
        ]);
    }



    public function add()
    {
        $venda = new Venda;
        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, true);
        
        if (isset($data)) {

            foreach ($data as $valor) {
                $somaValorProduto = $valor['quantidade'] * $valor['valor'];

                $venda->insert([
                    'un' => $valor['quantidade'],
                    'produto' => addslashes($valor['nome']),
                    'preco' => addslashes($somaValorProduto),
                    'data' => date('Y-m-d'),
                    'hora' => date('H:i:s'),
                    'tipo_venda' => $valor['tipo_venda'],
                    'tipo' => $valor['tipo']
                ])->execute();
            }
        }
        
    }
    
}
