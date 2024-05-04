<?php

    include 'config/conexao.php';
    
    // Libera CORS
    header('Access-Control-Allow-Origin: *');

    $action = $_GET['action'] ?? '';
    $id = $_GET['id'] ?? '';
    $msg = $_GET['msg'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php include 'metas.php'; ?>
    <title>Gerenciador de Usuários</title>
</head>

<body>

<div class="container-fluid">

    <?php include 'pages/includes/navbar.php'; ?>

    <div class="row">
        <div class="col-md-12 main">
            <!-- Menu Antigo -->
            <!-- <div class="col-md-2 menu">
                <div class="col-md-12 item-menu item-menu-ativo" id="pagina-inicial">
                    <div class="col-md-1 tarja"></div>
                    <div class="col-md-11 descricao">
                        Página Inicial
                    </div>
                </div>

                <div class="col-md-12 item-menu" id="usuarios">
                    <div class="col-md-1 tarja"></div>
                    <div class="col-md-11 descricao">
                        Usuários
                    </div>
                </div>
                <div class="col-md-12 menu-footer"></div>
            </div> -->

            <div class="col-md-12 conteudo">

                <div class="row pagina-inicial">
                    <?php include 'pages/pagina-inicial.php'; ?>
                </div>

                <div class="row oculto usuarios">
                    <?php include 'pages/usuarios.php'; ?>
                </div>

                <div class="row oculto usuarios-cadastro">
                    <?php include 'pages/cadastro/cadastrar-usuario.php'; ?>
                </div>

                <div class="row oculto usuarios-edicao">
                    <?php include 'pages/edicao/editar-usuario.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'scripts.php'; ?>
</body>
</html>
