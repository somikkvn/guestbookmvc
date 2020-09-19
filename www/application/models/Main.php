<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    public $error;

    public function registerAction($regUser, $regEmail, $regPass, $regFirst, $regLast)
    {
        $errors = [];
        $errors['error_username'] = "";
        $errors['email'] = "";
        $errors['username'] = "";
        $errors['error_password'] = "";
        $errors['error_passwords'] = "";

        if (strlen($regUser) > 30) {
            $errors['error_username'] = "Username does not fit";
        }
        if (strlen($_POST['password']) < 6) {
            $errors['error_password'] = "Password must be min six characters";
        }
        if ($_POST['password'] !== $_POST['confirm_password']) {
            $errors['error_passwords'] = "Password mismatch";
        }

        //Проверяем email на занятость
        $stmt = $this->db->prepare("SELECT * FROM users  WHERE email = :email");
        $stmt->bindParam(':email', $regEmail, \PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            $errors ['email'] = 'email is already registered';
        }

        //Проверяем username на занятость
        $stmt2 = $this->db->prepare("SELECT * FROM users  WHERE username = :username");
        $stmt2->bindParam(':username', $regUser, \PDO::PARAM_STR);
        $stmt2->execute();
        $row2 = $stmt2->rowCount();
        if ($row2 > 0) {
            $errors ['username'] = 'username is already registered';
        }

        if ($errors['error_username'] == "" && $errors['email'] == "" && $errors['username'] == "" && $errors['error_password'] == "" && $errors['error_passwords'] == "") {
            $stmt = $this->db->prepare("INSERT INTO users (`username`, `email`, `password`,                 `first_name`, `last_name`)
        VALUES (:username, :email, :password, :first_name, :last_name)");

            $stmt->bindParam(':username', $regUser, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $regEmail, \PDO::PARAM_STR);
            $stmt->bindParam(':password', $regPass, \PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $regFirst, \PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $regLast, \PDO::PARAM_STR);

            $stmt->execute();

        }
        return $errors;
    }
}