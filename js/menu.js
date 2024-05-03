$(document).ready(function () {

    let paginaInicial = 'pagina-inicial';
    let usuarios = 'usuarios';
    let categorias = 'categorias';

    // Comportamento menu
    $('#pagina-inicial').on('click', function () {
        $('#usuarios , #categorias').removeClass('item-menu-ativo');
        $(this).addClass('item-menu-ativo');

        $('.usuarios, .usuarios-cadastro, .produtos-edicao, .categorias, .categorias-cadastro, .categorias-edicao').fadeOut('fast');
        $('.pagina-inicial').removeClass('oculto').fadeIn('slow');
        $('#conteudo-pagina-inicial').fadeIn('slow');
    });

    $('#usuarios').on('click', function () {
        $('#pagina-inicial, #categorias').removeClass('item-menu-ativo');
        $(this).addClass('item-menu-ativo');

        $('.pagina-inicial, .usuarios-cadastro, .produtos-edicao, .categorias, .categorias-cadastro, .categorias-edicao').fadeOut('fast');
        $('.usuarios').removeClass('oculto').fadeIn('slow');
        $('#conteudo-usuarios').fadeIn('slow');
    });

    $('#categorias').on('click', function () {
        $('#pagina-inicial, #usuarios').removeClass('item-menu-ativo');
        $(this).addClass('item-menu-ativo');

        $('.pagina-inicial, .usuarios, .usuarios-cadastro, .produtos-edicao, .categorias-cadastro, .categorias-edicao').fadeOut('fast');
        $('.categorias').removeClass('oculto').fadeIn('slow');
        $('#conteudo-categorias').fadeIn('slow');
    });

    $('#' + paginaInicial).on('mouseover', function () {
        $('#usuarios, #categorias').removeClass('mouseOverMenu');
        $(this).addClass('mouseOverMenu')
    });

    $('#' + usuarios).on('mouseover', function () {
        $('#pagina-inicial, #categorias').removeClass('mouseOverMenu');
        $(this).addClass('mouseOverMenu')
    });

    $('#' + categorias).on('mouseover', function () {
        $('#pagina-inicial, #usuarios').removeClass('mouseOverMenu');
        $(this).addClass('mouseOverMenu')
    });
});
