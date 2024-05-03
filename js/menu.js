$(document).ready(function () {

    let paginaInicial = 'pagina-inicial';
    let usuarios = 'usuarios';

    // Comportamento menu
    $('#pagina-inicial').on('click', function () {
        $('#usuarios').removeClass('item-menu-ativo');
        $(this).addClass('item-menu-ativo');

        $('.usuarios, .usuarios-cadastro, .usuarios-edicao').fadeOut('fast');
        $('.pagina-inicial').removeClass('oculto').fadeIn('slow');
        $('#conteudo-pagina-inicial').fadeIn('slow');
    });

    $('#usuarios').on('click', function () {
        $('#pagina-inicial').removeClass('item-menu-ativo');
        $(this).addClass('item-menu-ativo');

        $('.pagina-inicial, .usuarios-cadastro, .usuarios-edicao').fadeOut('fast');
        $('.usuarios').removeClass('oculto').fadeIn('slow');
        $('#conteudo-usuarios').fadeIn('slow');
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
