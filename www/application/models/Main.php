<?php

namespace application\models;

use application\core\Model;

class Main extends  Model{


    public $error;

    public function registerAction($regUser, $regEmail, $regPass, $regFirst, $regLast)
    {
        $errors = [];
        $success = [];

        if (strlen($regUser)>30){$errors [] = "Username does not fit";}
        if (strlen($regEmail)>30){$errors [] = "Email does not fit";}
        if (strlen($_POST['password'])<6){$errors [] = "Password must be min six characters";}
        if (strlen($regFirst)>50){$errors [] = "Name does not fit";}
        if (strlen($regLast)>50){$errors [] = "Surname does not fit";}
        if ($_POST['password'] !== $_POST['confirm_password']){$errors [] = "Password mismatch";}

        if(empty($errors)){
            $stmt = $this->db->prepare("INSERT INTO users (`username`, `email`, `password`,                 `first_name`, `last_name`)
        VALUES (:username, :email, :password, :first_name, :last_name)");

            /*** bindParam ***/
            $stmt->bindParam(':username', $regUser, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $regEmail, \PDO::PARAM_STR);
            $stmt->bindParam(':password', $regPass, \PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $regFirst, \PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $regLast, \PDO::PARAM_STR);

            /*** запустить инструкцию sql ***/
            $stmt->execute();

            $success[] = "Вы успешно зарегистрированы";
            return [
                'success' => true,
                'success_messange' => $success,
            ];
        }else{
            return[
                'success' => false,
                'error_messange' => $errors,
            ];
        }
    }
}