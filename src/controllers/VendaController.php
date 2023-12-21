<?php

namespace src\controllers;

use \core\Controller;
use src\models\User;
use src\models\Venda;


class VendaController extends Controller
{

    public function index()

    {
        $time = 0;
        session_set_cookie_params($time);
        session_start();
        if (!isset($_SESSION['id'])) {
            $this->redirect('/login');
        } elseif (isset($_SESSION['cargo']) && $_SESSION['cargo'] !== 'gerente') {
            $this->render('home');
        }
        $this->render('vendas');
    }

    public function read()
    {
        $dataInicio = filter_input(INPUT_GET, 'dataInicio');
        $dataFinal = filter_input(INPUT_GET, 'dataFinal');
        $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : "";
        $store = Venda::select()

            ->where(function ($query) use ($tipo, $dataInicio, $dataFinal) {

                if ($tipo !== "") {
                    $query->where('tipo', '=', $tipo);
                }

                $query->where('data', '>=', $dataInicio)
                    ->where('data', '<=', $dataFinal);
            })
            ->get();


        $this->render('vendas', [
            'stores' => $store
        ]);
    }
}
