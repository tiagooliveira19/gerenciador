$(document).ready(function () {

    // Muda para o formulário cadastro de usuário
    $('#btn-cadastrar-usuarios').click(function () {
        $('#conteudo-usuarios').fadeOut('slow', function () {
            $('.usuarios-cadastro').removeClass('oculto').fadeIn('slow');
        });
    });

    // Volta para o inicio
    $('.btn-voltar-usuarios').click(function () {

        location.href = 'http://localhost/';
        
        $('.usuarios-cadastro, .usuarios-edicao, .pagina-inicial').fadeOut('slow', function () {
            $('#conteudo-usuarios').removeClass('oculto').fadeIn('slow');
        });
    });
});
