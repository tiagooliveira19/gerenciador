$(document).ready(function () {

    // Muda para o formulário cadastro de produto
    $('#btn-cadastrar-usuarios').click(function () {
        $('#conteudo-usuarios').fadeOut('slow', function () {
            $('.usuarios-cadastro').removeClass('oculto').fadeIn('slow');
        });
    });

    // Volta para o inicio
    $('.btn-voltar-usuarios').click(function () {

        location.href = 'http://localhost/';
        
        $('.usuarios-cadastro, .produtos-edicao, .pagina-inicial, .categorias, .categorias-cadastro, .categorias-edicao').fadeOut('slow', function () {
            $('#conteudo-usuarios').removeClass('oculto').fadeIn('slow');
        });
    });

    // Muda para o formulário cadastro de categoria
    $('#btn-cadastrar-categorias').click(function () {
        $('#conteudo-categorias').fadeOut('slow', function () {
            $('.categorias-cadastro').removeClass('oculto').fadeIn('slow');
        });
    });

    // Volta para o inicio
    $('.btn-voltar-categorias').click(function () {

        location.href = 'http://localhost/';

        $('.categorias-cadastro, .categorias-edicao, .pagina-inicial, .produtos, .usuarios-cadastro, .produtos-edicao').fadeOut('slow', function () {
            $('#conteudo-categorias').removeClass('oculto').fadeIn('slow');
        });
    });
});
