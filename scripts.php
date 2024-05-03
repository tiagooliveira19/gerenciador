<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" 
        referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"
        integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.css" rel="stylesheet">
<script type="text/javascript" src="/js/menu.js"></script>
<script type="text/javascript" src="/js/pages.js"></script>
<script>

    $(document).ready(function () {

        /* new SlimSelect({
            select: '.select-categorias',
            placeholder: 'Selecione uma categoria'
        });

        new SlimSelect({
            select: '.select-categorias-edicao',
            placeholder: 'Selecione uma categoria'
        }); */

        $(".money").inputmask( 'currency', {
            "autoUnmask": true,
            radixPoint:",",
            groupSeparator: ".",
            allowMinus: false,
            prefix: 'R$ ',
            digits: 2,
            digitsOptional: false,
            rightAlign: false,
            unmaskAsNumber: true
        });

        // Verifica se o action e o id estão setados para mudar de página
        if ('<?php echo $action; ?>' !== '' && '<?php echo $id; ?>' !== '') {

            if ('<?php echo $action; ?>' === 'editar-usuario') {

                $('#conteudo-pagina-inicial, #conteudo-usuarios').fadeOut('slow', function () {
                    $('.usuarios-edicao').removeClass('oculto').fadeIn('slow');
                    $('#pagina-inicial').removeClass('item-menu-ativo');
                    $('#usuarios').addClass('item-menu-ativo');
                });
            }
        }

        // Exibe mensagem de acordo com o retorno
        if ('<?php echo $msg; ?>' !== '') {

            if ('<?php echo $msg; ?>' === 'cadastro') {
                swal("", 'Cadastro realizado com sucesso!', "success");
            }

            if ('<?php echo $msg; ?>' === 'atualizacao') {
                swal("", 'Alteração realizada com sucesso!', "success");
            }

            if ('<?php echo $msg; ?>' === 'exclusao') {
                swal("", 'Exclusão realizada com sucesso!', "success");
            }

            if ('<?php echo $msg; ?>' === 'erro') {
                swal("", 'Houve algum erro durante a execução. Por favor, tente novamente!', "error");
            }
        }
    });
</script>
