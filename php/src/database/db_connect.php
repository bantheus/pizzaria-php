<?php

    $host = 'db';
    $user = 'root';
    $pass = 'MYSQL_ROOT_PASSWORD';
    $database = 'MYSQL_DATABASE';

    //conexão com o banco
    $conn = mysqli_connect($host, $user, $pass, $database);

    //verifica se a conexão foi bem sucedida
    if (!$conn) {
        echo 'Connection error:'.mysqli_connect_error();
    }

?>