<?php

    $conexao = mysqli_connect("localhost:3306", "root", "SENHAUSUARIO", "Desafio");
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $genero = $_POST["escolha"];

    mysqli_query($conexao, "INSERT INTO pessoa(apelido, senha, genero) VALUES ('$nome', '$senha', '$genero')");

    mysqli_query($conexao, "SELECT * FROM Pessoa");

    
    $response = ['message' => 'Usuário cadastrado com sucesso!'];
    echo json_encode($response);









?>