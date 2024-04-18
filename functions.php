<?php

function dd($user) {
    echo "<pre>";
    var_dump($user);
    echo "</pre>";
    die();
  }

  function auth() {
    if(!isset($_SESSION["user"])) {
      header("Location: /login");
      die();
    }
}

function guest() {
  if(isset($_SESSION["user"])) {
    header("Location: /");
    die();
  }
}

?>