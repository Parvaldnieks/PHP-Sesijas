<?php

session_start();

$_SESSION["username"] = "Young Krigga";
$_SESSION["age"] = 69;

echo "Hi, " . $_SESSION["username"] . "<br>";

echo "Age is " . $_SESSION["age"] . "<br>";