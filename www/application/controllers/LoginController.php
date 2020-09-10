<?php

namespace application\controllers;

use application\core\Controller;


class LoginController extends Controller {

    public function loginAction() {
        $data = [];
        if(!empty($_POST) && !empty($_POST['email'])  && !empty($_POST['password'])){
            $regEmail = $_POST['email'];
            $resultModel=$this->model->loginAction($regEmail, $_POST['password']);

             if ($resultModel['success'] == true) {
                 //если пользователь авторизовался присваиваем сессию и перенаправляем
                 $_SESSION['id'] = $resultModel['user_id'];
             exit("<meta http-equiv='refresh' content='0; url= /guestbook'>");
//                 header('Location: /guestbook');
            }
             else {
                 $data['error'] = $resultModel['error_messange'];

            }
        }
        $this->view->render('Авторизация', $data);
    }
}