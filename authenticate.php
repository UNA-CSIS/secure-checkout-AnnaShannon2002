<?php
session_start();

$quantity1 = $_SESSION['q1'];
$quantity2 = $_SESSION['q2'];
$quantity3 = $_SESSION['q3'];
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
        <form method="post" action="checkout.php" method="POST">
            Name: <input type="text" name="name" /><br>
            Password: <input type="password" name="pwd" /><br>
            Remember Me: <input type="checkbox" name="remember" value="ON" /><br>
            <input type="submit" />
    </body>
</html>
