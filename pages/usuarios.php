<?php

    $select_usuarios = 'SELECT id, nome, idade, estado, biografia, data_criacao FROM usuarios ';
    $result = mysqli_query($conexao, $select_usuarios);
    $qtd_registros = mysqli_num_rows($result);
?>

<div id="conteudo-usuarios">
    <div class="col-md-12 w-90 cabecalho">
        <label class="cabecalho-label">Usuários</label>
    </div>

    <div class="col-md-10 margin-auto mt-5">
        <table class="table table-striped table-dark">

            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Estado</th>
                <th>Biografia</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
            </thead>

            <tbody>
            <?php

                if ($qtd_registros > 0) {

                    while ($usuario = mysqli_fetch_object($result)) { ?>

                        <tr>
                            <td><?php echo $usuario->id; ?></td>
                            <td><?php echo $usuario->nome; ?></td>
                            <td><?php echo $usuario->idade; ?></td>
                            <td><?php echo $usuario->estado; ?></td>
                            <td><?php echo mb_strimwidth($usuario->biografia, 0, 50, '...'); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($usuario->data_criacao)); ?></td>
                            <td>
                                <a href="index.php?action=editar-usuario&id=<?php echo $usuario->id; ?>">
                                    <span class="links pointer" title="Editar"><i class="fas fa-edit"></i></span>
                                </a>

                                <a href="/app/validacoes/exclusao/excluir_usuario.php?id=<?php echo $usuario->id; ?>">
                                    <span class="links pointer ml-10" title="Deletar"><i class="fas fa-trash-alt"></i></span>
                                </a>
                            </td>
                        </tr>
                    <?php }

                } else { ?>

                    <tr>
                        <td colspan="7" class="text-center">Nenhum registro encontrado!</td>
                    </tr>
                <?php }
            ?>
            </tbody>
        </table>
    </div>

    <div class="col-md-10 margin-auto mt-5">
        <div class="col-md-6 float-end">
            <button type="button" class="btn btn-dark float-end" id="btn-cadastrar-usuarios">Cadastrar Usuários</button>
        </div>
    </div>
</div>
