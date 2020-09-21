<?php
session_start();
unset($_SESSION["userdata"]);
unset($_SESSION["cart"]);
setcookie("token", "delete", -10, "/");
header("Location: index.php");

