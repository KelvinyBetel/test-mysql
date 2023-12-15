<?php
$hostname = "localhost";
$database = "db_page";
$username = "root";
$password = "root";

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}
?>
