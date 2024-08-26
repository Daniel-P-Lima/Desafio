<?php
    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha']))
    {
        $conexao = mysqli_connect("localhost:3306", "root", "SENHAUSUARIO", "Desafio");
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];
        
        
        $select = "SELECT * FROM pessoa WHERE apelido = '$nome' and senha = '$senha'";
        $genero = "SELECT genero FROM pessoa";
        $resultado = $conexao ->query($select);

        if($genero == 'M')
        {
            echo'<h1>Seja Bem-vindo, Login Feito Com Sucesso!</h1>';
        }
        else if($genero == 'F')
        {
            echo'<h1>Seja Bem-vinda, Login Feito Com Sucesso!</h1>';
        }
        else if($genero == 'N')
        {
            echo'<h1>Seja Bem-vindo(a), Login Feito Com Sucesso!</h1>';
        }

        echo json_encode($response);


        if(mysqli_num_rows($resultado) < 1)
        {
            header('Location: ../login.html');
        }
        elseif(mysqli_num_rows($resultado) > 0)
        {
            header('Location: ../home.html');
        }
    }
    else
    {
        header('Location: ../login.html');
    }





?>