<?php

    include '../../../config/conexao.php';

    // Local onde será salvo a imagem
    $diretorio = "../../../uploads/img_usuarios/";

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $biografia = $_POST['biografia'];
    $imagem = $_FILES["imagem"];
    $imagem_upload = null;

    /* echo '
        <b>Nome:</b> '. $nome .' <br>
        <b>Idade:</b> '. $idade .' <br>
        <b>Rua:</b> '. $rua .' <br>
        <b>Bairro:</b> '. $bairro .' <br>
        <b>Estado:</b> '. $estado .' <br>
        <b>Biografia:</b> '. $biografia .' <br>
        <b>Imagem:</b> '. $imagem .' <br>
    '; */

    // Se houver o upload da imagem
    if ($imagem) {

        $imagem_diretorio = $diretorio . basename($_FILES["imagem"]["name"]);
        $imagem_extensao = strtolower(pathinfo($imagem_diretorio, PATHINFO_EXTENSION));
        $imagem_upload = $_FILES["imagem"]["name"];

        // var_dump($imagem_diretorio);
        // var_dump($imagem_extensao); die();

        // Verifica extensões permitidas
        if ($imagem_extensao != "jpg" && $imagem_extensao != "png" && $imagem_extensao != "jpeg" ) {
            header("location: ../../../index.php?msg=erro");
            die();
        }

        // Faz upload da imagem;
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem_diretorio);
    }

    $insert_usuario = 'INSERT INTO usuarios (nome, idade, rua, bairro, estado, biografia, imagem, data_criacao) 
                       VALUES ("'. $nome .'", "'. $idade .'", "'. $rua .'", "'. $bairro .'", "'. $estado .'", "'. $biografia .'", "'. $imagem_upload .'", NOW())';
    mysqli_query($conexao, $insert_usuario);

    header("location: ../../../index.php?msg=cadastro");
