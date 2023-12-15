<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: index.php");
        exit;
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
        <title>Projeto Zetta</title>
    </head>
    <body>
        <h1>
        Seja bem vindo!
        </h1>
        <br>
        <br>
        <a href="sair.php"> Sair </a>
    </body>
</html>
