<?php

guest();

require "Validator.php";
require "Database.php";
$config = require("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database($config);
    $errors = [];

    if(!Validator::email($_POST["email"])) {
        $errors["email"] = "Nepareiz e-pasta formāts!";
    }
    if(!Validator::password($_POST["password"])) {
        $errors["password"] = "Parolē ir nepilnības!";
    }

    $query = "SELECT * FROM users WHERE email = :email;";
    $params = [":email" => $_POST["email"]];

    $result = $db->execute($query, $params)->fetch();

// Parbaudis vai datubaze ir e-pasts
    if($result) {
        $errors["email"] = "Konts jau ar to ēpastu pastāv!";
    }

    if(empty($errors)) {
        $query = "INSERT INTO users (email, password)
                  VALUES (:email, :password);";
            $params = [
                ":email" => $_POST["email"],
                ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
            ];
        $result = $db->execute($query, $params);

        $_SESSION["flash"] = "Tu esi veiksmīgi reģistrēts";
        header("Location: /login");
        die();
    }
}

// Ielikt DB

$title = "Register page!";
require "views/auth/register.view.php";