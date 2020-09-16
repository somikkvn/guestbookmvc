<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    public $error;

    public function registerAction($regUser, $regEmail, $regPass, $regFirst, $regLast, $err_email, $err_username)
    {
        $errors = [];
//        $error = 0;
        $success = [];

        if (strlen($regUser) > 30) {
            $_SESSION['error_username'] = "Username does not fit";
        }
        if (strlen($regEmail) > 30) {
            $_SESSION['error_email'] = "Email does not fit";
        }
        if (strlen($_POST['password']) < 6) {
            $_SESSION['error_password'] = "Password must be min six characters";
        }
        if (strlen($regFirst) > 50) {
            $_SESSION['error_first_name'] = "Name does not fit";
        }
        if (strlen($regLast) > 50) {
            $_SESSION['error_last_name'] = "Surname does not fit";
        }
        if ($_POST['password'] !== $_POST['confirm_password']) {
            $_SESSION['error_password'] = "Password mismatch";
        }

        //Проверяем email на занятость
        $stmt = $this->db->prepare("SELECT * FROM users  WHERE email = :email");
        $stmt->bindParam(':email', $regEmail, \PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->rowCount();
//        return $row;
        if ($row > 0) {
            $err_email = 'email is already registered';
            $errors [] = 'email is already registered';
            $_POST['err_email'] = $err_email;
        }

        //Проверяем username на занятость
        $stmt2 = $this->db->prepare("SELECT * FROM users  WHERE username = :username");
        $stmt2->bindParam(':username', $regUser, \PDO::PARAM_STR);
        $stmt2->execute();
        $row2 = $stmt2->rowCount();
//        return $row2;
        if ($row2 > 0) {
            $err_username = 'username is already registered';
            $errors [] = 'username is already registered';
            $_POST['err_username'] = $err_username;
        }

        if (empty($errors)) {
            $stmt = $this->db->prepare("INSERT INTO users (`username`, `email`, `password`,                 `first_name`, `last_name`)
        VALUES (:username, :email, :password, :first_name, :last_name)");

            $stmt->bindParam(':username', $regUser, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $regEmail, \PDO::PARAM_STR);
            $stmt->bindParam(':password', $regPass, \PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $regFirst, \PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $regLast, \PDO::PARAM_STR);

            $stmt->execute();

            $success[] = "Вы успешно зарегистрированы";
            return [
                'success' => true,
                'success_messange' => $success,
            ];
        } else {
            return [
                'success' => false,
                'error_messange' => $errors,
            ];
        }
    }
}