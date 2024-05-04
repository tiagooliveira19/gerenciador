<?php

    include '../../../config/conexao.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $biografia = $_POST['biografia'];

    $update_usuario = 'UPDATE usuarios SET nome = "'. $nome .'", idade = "'. $idade .'", rua = "'. $rua .'", bairro = "'. $bairro .'", 
                              cidade = "'. $cidade .'", estado = "'. $estado .'", cep = "'. $cep .'", biografia = "'. $biografia .'" WHERE id = '. $id;
    mysqli_query($conexao, $update_usuario);

    header("location: ../../../index.php?msg=atualizacao");
