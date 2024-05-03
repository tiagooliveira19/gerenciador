$(document).ready(function () {

    // Muda para o formulário cadastro de usuário
    $('#btn-cadastrar-usuarios').click(function () {
        $('#conteudo-usuarios').fadeOut('fast', function () {
            $('.usuarios-cadastro').removeClass('oculto').fadeIn('fast');
        });
    });

    // Volta para o inicio
    $('.btn-voltar-usuarios').click(function () {

        // location.href = 'http://localhost/';
        
        $('.usuarios-cadastro, .usuarios-edicao, .pagina-inicial').fadeOut('fast', function () {
            $('#conteudo-usuarios, .usuarios').removeClass('oculto').fadeIn('fast');
        });
    });
});
