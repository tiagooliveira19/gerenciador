<?php

    include '../../../config/conexao.php';

    // Local onde será salvo a imagem
    $diretorio = "../../../uploads/img_usuarios/";

    $id = $_POST['id'];

    // Seleciona imagem para atualização
    $select_usuario_imagem = 'SELECT imagem FROM usuarios WHERE id = '. $id;
    $result = mysqli_query($conexao, $select_usuario_imagem);
    $usuario = mysqli_fetch_object($result);

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $biografia = $_POST['biografia'];
    $imagem = $_FILES["imagem"];
    $imagem_upload = $usuario->imagem;

    // Se houver o upload da imagem
    if ($imagem['name'] && $imagem['tmp_name']) {

        // Verifica se diretório existe, caso contrário cria o mesmo
        if (!is_dir($diretorio)) {
            mkdir($diretorio,0, 777);
        }

        // Exclui imagem antiga
        unlink($diretorio.$imagem_upload);

        $imagem_diretorio = $diretorio . basename($_FILES["imagem"]["name"]);
        $imagem_extensao = strtolower(pathinfo($imagem_diretorio, PATHINFO_EXTENSION));
        $imagem_upload = $_FILES["imagem"]["name"];

        // Verifica extensões permitidas
        if ($imagem_extensao != "jpg" && $imagem_extensao != "png" && $imagem_extensao != "jpeg" ) {
            header("location: ../../../index.php?msg=erro");
            die();
        }

        // Faz upload da imagem;
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem_diretorio);
    }

    $update_usuario = 'UPDATE usuarios SET nome = "'. $nome .'", idade = "'. $idade .'", rua = "'. $rua .'", bairro = "'. $bairro .'", 
                              cidade = "'. $cidade .'", estado = "'. $estado .'", cep = "'. $cep .'", biografia = "'. $biografia .'", imagem = "'. $imagem_upload .'" WHERE id = '. $id;
    mysqli_query($conexao, $update_usuario);

    header("location: ../../../index.php?msg=atualizacao");
