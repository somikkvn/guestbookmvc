<?php

namespace application\models;

use application\core\Model;

class Login extends  Model
{

    public function loginAction($regEmail, $regPass)
    {

//        var_dump($_POST);
//        die;
        //создаем два массива для хранения в них данных в случае успеха и ошибок
        $errors = [];
        $success = [];

        //Проверяем на пустоту поле email и в случае ошибки вносим данные в массив $errors
        if (empty($regEmail)) {
            $errors [] = "Please enter your email";
        }
        if (strlen($_POST['password']) < 6) {
            $errors [] = "Password must be min six characters";
        }

        //если массив с ошибками пуст:
        if (empty($errors)) {
            //выбираем данные из таблицы users
            $stmt = $this->db->prepare("SELECT * FROM users WHERE(email = '$regEmail') limit 1");

            /*** bindParam ***/

            $stmt->bindParam(':email', $regEmail, \PDO::PARAM_STR);

            /*** запустить инструкцию sql ***/
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            //Проверяем пароль на соответствие
            $verify = password_verify($regPass, $result['password']);

            //Если проверка прошла успешно:
            if ($verify) {
                $success[] = "You have successfully signed in";
//                var_dump($success);
//                die;
                return [
                    'user_id' => $result['id'],
                    'success' => true,
                    'success_messange' => $success,
                ];

                //Иначе выводим сообщение:
            } else {
                $errors [] = "Wrong password";
            }
        }
        return [
        'success' => false,
        'error_messange' => $errors,
        ];
    }
}