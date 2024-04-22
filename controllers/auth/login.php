<?php

guest();

require "../core/Validator.php";
require "../core/Database.php";
$config = require("../config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database($config);
    $errors = [];

    if(!Validator::email($_POST["email"])) {
        $errors["email"] = "Nepareizs e-pasta formāts!";
    }

    $query = "SELECT * FROM users WHERE email = :email";
        $params = [
            ":email" => $_POST["email"],
        ];
        $user = $db->execute($query, $params)->fetch();

        if(!$user || !password_verify($_POST["password"], $user["password"])) {
            $errors["password"] = "Kaut kas nav labi!";
        }

    if(empty($errors)) {
        $_SESSION["user"] = true;
        $_SESSION["email"] = $_POST["email"];
        header("Location: /");
        die();
    }
}

$title = "Login page!";
require "../views/auth/login.view.php";

unset($_SESSION["flash"]);