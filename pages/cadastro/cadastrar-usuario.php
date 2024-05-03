<?php

    /* $select_categorias = 'SELECT id, name FROM categorias';
    $result = mysqli_query($conexao, $select_categorias); */
?>

<div id="conteudo-cadastro-usuario">

    <div class="col-md-12 w-90 mt-3 cabecalho">
        <label class="cabecalho-label">Cadastrar Usuário</label>
    </div>

    <div class="col-md-10 mt-5">

        <div class="col-md-8 margin-auto">

            <form class="mt-100" autocomplete="off" method="post" action="/app/validacoes/cadastro/cadastrar_usuario.php">

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" name="idade" id="idade" placeholder="Idade" required>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <input type="text" class="form-control" name="rua" id="rua" placeholder="Rua" required>
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" required>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado" required>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <textarea class="form-control" name="biografia" id="biografia" rows="3" placeholder="Biografia..."></textarea>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <input type="file" class="form-control" name="imagem" id="imagem" placeholder="Imagem Perfil">
                    </div>
                </div>

                <!-- <div class="row mt-2">
                    <div class="col">
                        <select class="select-categorias" name="category_id[]" id="category_id" multiple required>
                            <?php // while ($categoria = mysqli_fetch_object($result)) { ?>
                                <option value="<?php // echo $categoria->id; ?>"><?php // echo $categoria->name; ?></option>
                            <?php // } ?>
                        </select>
                    </div>
                </div> -->

                <div class="row mt-5">
                    <div class="col">
                        <button type="button" class="btn btn-dark w-100 btn-voltar-usuarios">Voltar</button>
                    </div>
                    
                    <div class="col">
                        <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- <div class="col-md-2 mt-5 margin-auto"></div> -->
    </div>
</div>
