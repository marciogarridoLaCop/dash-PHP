<?php
//Dados de conexão do banco
$servername = "lacopuff.com";
$dbname = "lacopu67_for";
$username = "lacopu67_for_admin";
$password = "987654";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} 