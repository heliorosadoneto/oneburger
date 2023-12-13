<?php
namespace src\controllers;
use \core\Controller;
use src\handlers\LoginHandlers;

class LoginController extends Controller
{
    public function singnin(){
        
        $this->render('login');
    }

    public function singninAction(){
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST,'senha');
        if($email && $senha){
            LoginHandlers::VerifyLogin($email, $senha);
            exit;
        }else{
            $this->redirect('/login');
        }
    }

    public function sair(){
        session_start();
        session_destroy();
        $this->redirect('/login');
    }
   
}
?>