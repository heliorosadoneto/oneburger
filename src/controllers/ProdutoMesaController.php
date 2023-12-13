<?php
namespace src\controllers;

use \core\Controller;

class ProdutoMesaController extends Controller {

    public function index($id){
        session_start();
        $_SESSION['mesa'] = $id;
        $this->redirect('/');
    }

}