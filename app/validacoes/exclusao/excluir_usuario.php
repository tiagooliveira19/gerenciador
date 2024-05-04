<?php

    include '../../../config/conexao.php';

    // Local onde a imagem foi salva
    $diretorio = "../../../uploads/img_usuarios/";

    $id = $_GET['id'];

    // Seleciona imagem para exclusão
    $select_usuario_imagem = 'SELECT imagem FROM usuarios WHERE id = '. $id;
    $result = mysqli_query($conexao, $select_usuario_imagem);
    $usuario = mysqli_fetch_object($result);
    $imagem = $usuario->imagem;

    // Exclui imagem usuário
    unlink($diretorio.$imagem);

    $delete_usuario = 'DELETE FROM usuarios WHERE id = '. $id;
    mysqli_query($conexao, $delete_usuario);

    header("location: ../../../index.php?msg=exclusao");
    
