<?php

session_start();

echo "DashBoard <br>";

echo "Hi, " . ($_SESSION["username"] . "<br>Age is " . $_SESSION["age"] ?? "guest");