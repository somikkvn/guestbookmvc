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

            $result = $this->model->registerAction($regUser, $regEmail, $regPass, $regFirst, $regLast);
            if (!empty($result['error_messange'])) {
                $data['error'] = $result['error_messange'];
            }
            else {
                header('Location: /login');
            }
        }
        $this->view->render('Регистрация', $data);
    }

    public function logoutAction()
    {
        $this->view->render('Выход');
    }
}