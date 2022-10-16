## Autor : Márcio Garrido
### marciogarrido@id.uff.br
## Dashboard de captura de dados IOT
[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

## Sobre o projeto

- 📝 Tecnologias do projeto  **MySQL, PHP 8.2,Bootstrap 4,Chart.js**


## Organização

As conexões do banco de dados são configuradas no arquivo cnn.php:

    <?php
    
    $servername = "servidor.com.br";
    $dbname = "nome do banco";
    $username = "login";
    $password = "senha";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        } 


O Dashboard é organizado em basicamente pelo arquivo dashboard.php. A página padrão é carregada por mais dois outros aquivos que ficam na 
pasta /php_files.
    
    dashboard.php

![Screenshot](img/arquitetura.png)

