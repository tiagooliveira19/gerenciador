$(document).ready(function () {

    let paginaInicial = 'pagina-inicial';
    let usuarios = 'usuarios';

    // Comportamento menu
    $('#pagina-inicial').on('click', function () {
        $('#usuarios').removeClass('item-menu-ativo');
        $(this).addClass('item-menu-ativo');

        $('.usuarios, .usuarios-cadastro, .usuarios-edicao').fadeOut('fast');
        $('.pagina-inicial').removeClass('oculto').fadeIn('fast');
        $('#conteudo-pagina-inicial').fadeIn('fast');
    });

    $('#usuarios').on('click', function () {
        $('#pagina-inicial').removeClass('item-menu-ativo');
        $(this).addClass('item-menu-ativo');

        $('.pagina-inicial, .usuarios-cadastro, .usuarios-edicao').fadeOut('fast');
        $('.usuarios').removeClass('oculto').fadeIn('fast');
        $('#conteudo-usuarios').fadeIn('fast');
    });

    $('#' + paginaInicial).on('mouseover', function () {
        $('#usuarios, #categorias').removeClass('mouseOverMenu');
        $(this).addClass('mouseOverMenu')
    });

    $('#' + usuarios).on('mouseover', function () {
        $('#pagina-inicial, #categorias').removeClass('mouseOverMenu');
        $(this).addClass('mouseOverMenu')
    });
});
