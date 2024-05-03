<?php

    include '../../../config/conexao.php';

    $id = $_GET['id'];

    $delete_usuario = 'DELETE FROM usuarios WHERE id = '. $id;
    mysqli_query($conexao, $delete_usuario);

    header("location: ../../../index.php?msg=exclusao");
    
