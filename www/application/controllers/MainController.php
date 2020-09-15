<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $this->view->render('Главная страница');
    }

    function registerAction()
    {
        $data = [];
        if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['email']) && !empty   ($_POST['first_name'])
            && !empty($_POST['last_name']) && !empty($_POST['password'])) {
            $hashPass = $_POST['password'];
            $hash = password_hash($hashPass, PASSWORD_DEFAULT);
            $regUser = $_POST['username'];
            $regEmail = $_POST['email'];
            $regFirst = $_POST['first_name'];
            $regLast = $_POST['last_name'];
            $regPass = $hash;
            $err_email = $_POST['err_email'];


            $result = $this->model->registerAction($regUser, $regEmail, $regPass, $regFirst, $regLast, $err_email);
            if (!empty($result['error_messange'])) {
                $data['error'] = $result['error_messange'];
               return false;
            }
            else {
                header('Location: /login');
                return true;
            }
        }
        $this->view->render('Регистрация', $data);
    }

    public function logoutAction()
    {
        $this->view->render('Выход');
    }
}