<?php
session_start();

$valid_users = [
    "user" => "password"
];

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "testinput.php";
    $name = test_input($_POST["name"] ?? "");
    $pwd = test_input($_POST["pwd"] ?? "");

    if (!empty($name) && !empty($pwd) && isset($valid_users[$name]) && $valid_users[$name] == $pwd) {
        $_SESSION["user"] = $name;
        header("Location: checkout.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <form method="post">
            <h1>Login</h1><hr><br>
            Name: <input type="text" name="name" required /><br>
            Password: <input type="password" name="pwd" required /><br>
            <input type="submit" value="Login"/>
    </body>
</html>
