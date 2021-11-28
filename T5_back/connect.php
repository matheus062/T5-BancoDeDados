<?php
    //                        ip       user     senha        Banco de dados
    $mysqli = new mysqli('localhost', 'root', 'matheus0', 'trabalho5_ries_silvestre');

    if (mysqli_connect_error()) {
        echo "Erro ao conectar com o BD: " . mysqli_connect_error();
        exit();
    }
?>