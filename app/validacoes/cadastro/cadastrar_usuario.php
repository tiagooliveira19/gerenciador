<?php

    include '../../../config/conexao.php';

    // Local onde será salvo a imagem
    $diretorio = "../../../uploads/img_usuarios/";

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $rua = $_POST['rua'] ?? null;
    $bairro = $_POST['bairro'] ?? null;
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $biografia = $_POST['biografia'] ?? null;
    $imagem = $_FILES["imagem"];
    $imagem_upload = null;

    // Se houver o upload da imagem
    if ($imagem) {

        // var_dump(is_dir($diretorio)); die();

        // Verifica se diretório existe, caso contrário cria o mesmo
        if (!is_dir($diretorio)) {
            mkdir($diretorio,0, 777);
        }

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

    $insert_usuario = 'INSERT INTO usuarios (nome, idade, rua, bairro, cidade, estado, cep, biografia, imagem, data_criacao) 
                       VALUES ("'. $nome .'", "'. $idade .'", "'. $rua .'", "'. $bairro .'", "'. $cidade .'", "'. $estado .'", "'. $cep .'", "'. $biografia .'", "'. $imagem_upload .'", NOW())';
    mysqli_query($conexao, $insert_usuario);

    header("location: ../../../index.php?msg=cadastro");
