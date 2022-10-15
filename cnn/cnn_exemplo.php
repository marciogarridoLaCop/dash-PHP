<?php
//Dados de conexão do banco
$servername = "servidor.com.br";
$dbname = "nome do banco";
$username = "login";
$password = "senha";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} 