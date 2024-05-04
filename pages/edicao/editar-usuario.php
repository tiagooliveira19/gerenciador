<?php

    $id = $_GET['id'] ?? '';

    if ($id) {

        $select_usuarios = 'SELECT nome, idade, rua, bairro, cidade, estado, cep, biografia, imagem, data_criacao FROM usuarios WHERE id = '. $id;
        $result = mysqli_query($conexao, $select_usuarios);
        $usuario = mysqli_fetch_object($result);

        $nome = $usuario->nome;
        $idade = $usuario->idade;
        $rua = $usuario->rua;
        $bairro = $usuario->bairro;
        $cidade = $usuario->cidade;
        $estado = $usuario->estado;
        $cep = $usuario->cep;
        $biografia = $usuario->biografia;
        $imagem = $usuario->imagem;
        $data_criacao = date('d/m/Y', strtotime($usuario->data_criacao));
    }

?>

<div id="conteudo-edicao-produto" class="mb-5">

    <div class="col-md-12 w-90 mt-3 cabecalho">
        <label class="cabecalho-label">Edição Usuário</label>
    </div>

    <div class="col-md-12 mt-5">

        <div class="col-md-10 mx-auto">

            <form class="mt-3" autocomplete="off" method="post" action="/app/validacoes/edicao/editar_usuario.php">

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="row">
                    <?php if ($imagem) { ?>
                        <img class="img-perfil mx-auto" src="uploads/img_usuarios/<?php echo $imagem; ?>" alt="Imagem Perfil">
                    <?php } else { ?>
                        <i class="fa-regular fa-circle-user img-perfil-empty mx-auto"></i>
                    <?php } ?>    
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php echo $nome ?: ''; ?>" required>
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" name="idade" id="idade" placeholder="Idade" value="<?php echo $idade ?: ''; ?>" required>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <input type="text" class="form-control" name="rua" id="rua-edicao" placeholder="Rua" value="<?php echo $rua ?: ''; ?>">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" name="bairro" id="bairro-edicao" placeholder="Bairro" value="<?php echo $bairro ?: ''; ?>">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <input type="text" class="form-control" name="cidade" id="cidade-edicao" placeholder="Cidade" value="<?php echo $cidade ?: ''; ?>" required>
                    </div>

                    <div class="col-6">
                        <input type="text" class="form-control" name="estado" id="estado-edicao" placeholder="Estado" value="<?php echo $estado ?: ''; ?>" required>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <input type="text" class="form-control cep" name="cep" id="cep-edicao" placeholder="CEP" value="<?php echo $cep ?: ''; ?>" required>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <textarea class="form-control" name="biografia" id="biografia" rows="3" placeholder="Biografia"><?php echo $biografia ?: ''; ?></textarea>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <input type="text" class="form-control" name="data_criacao" id="data_criacao" title="Data Criação" placeholder="Data Criação"
                               value="<?php echo $data_criacao ?: ''; ?>" readonly disabled>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-6">
                        <button type="button" class="btn btn-dark w-100 btn-voltar-usuarios">Voltar</button>
                    </div>
                                
                    <div class="col-6">
                        <button type="submit" class="btn btn-success w-100">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
