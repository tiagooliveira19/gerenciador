<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" 
        referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"
        integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="/js/menu.js"></script>
<script type="text/javascript" src="/js/pages.js"></script>
<script>

    $(document).ready(function () {

        // Máscara CEP
        $(".cep").inputmask({"mask": "99.999-999"});

        // Busca endereço de acordo com CEP digitado
        $('#cep').keyup(function () {
            getDataCEP ('cep', 'rua', 'bairro', 'cidade', 'estado');
            return false;
        });

        $('#cep-edicao').keyup(function () {
            getDataCEP ('cep-edicao', 'rua-edicao', 'bairro-edicao', 'cidade-edicao', 'estado-edicao');
            return false;
        });

        // Verifica se o action e o id estão setados para mudar de página
        if ('<?php echo $action; ?>' !== '' && '<?php echo $id; ?>' !== '') {

            if ('<?php echo $action; ?>' === 'editar-usuario') {

                $('#conteudo-pagina-inicial, #conteudo-usuarios').fadeOut('slow', function () {
                    $('.usuarios-edicao').removeClass('oculto').fadeIn('slow');
                    // $('#pagina-inicial').removeClass('item-menu-ativo');
                    // $('#usuarios').addClass('item-menu-ativo');
                    $('#pagina-inicial').removeClass('light-gray');
                    $('#usuarios').addClass('light-gray');
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

    // Converte sigla estados para nome
    function converteNomeEstados (sigla) {
      
        var data;

        switch (sigla.toUpperCase()) {
            case "AC" : data = "Acre";                  break;
            case "AL" : data = "Alagoas";               break;
            case "AM" : data = "Amazonas";              break;
            case "AP" : data = "Amapá";                 break;
            case "BA" : data = "Bahia";                 break;
            case "CE" : data = "Ceará";                 break;
            case "DF" : data = "Distrito Federal";      break;
            case "ES" : data = "Espírito Santo";        break;
            case "GO" : data = "Goiás";                 break;
            case "MA" : data = "Maranhão";              break;
            case "MG" : data = "Minas Gerais";          break;
            case "MS" : data = "Mato Grosso do Sul";    break;
            case "MT" : data = "Mato Grosso";           break;
            case "PA" : data = "Pará";                  break;
            case "PB" : data = "Paraíba";               break;
            case "PE" : data = "Pernambuco";            break;
            case "PI" : data = "Piauí";                 break;
            case "PR" : data = "Paraná";                break;
            case "RJ" : data = "Rio de Janeiro";        break;
            case "RN" : data = "Rio Grande do Norte";   break;
            case "RO" : data = "Rondônia";              break;
            case "RR" : data = "Roraima";               break;
            case "RS" : data = "Rio Grande do Sul";     break;
            case "SC" : data = "Santa Catarina";        break;
            case "SE" : data = "Sergipe";               break;
            case "SP" : data = "São Paulo";             break;
            case "TO" : data = "Tocantins";             break;
        }

      return data;
    };

    // Busca dados CEP via api
    function getDataCEP (cep, rua, bairro, cidade, estado) {

        if ($('#' + cep).val().length === 10) {

            $.getJSON("https://viacep.com.br/ws/" + $('#' + cep).val().replace(/[^\d]+/g,'') + "/json/", function (data) {

                var resultadoCEP = data;

                if( (resultadoCEP["logradouro"] !== '' && resultadoCEP["logradouro"] !== undefined) || (resultadoCEP["localidade"] !== '' && resultadoCEP["localidade"] !== undefined) ) {

                    $('#' + rua).val(unescape(resultadoCEP["logradouro"]));
                    if (unescape(resultadoCEP["logradouro"]) !== '') {
                        $('#' + rua).attr('readonly', true);
                    }

                    $('#' + bairro).val(unescape(resultadoCEP["bairro"]));
                    if (unescape(resultadoCEP["bairro"]) !== '') {
                        $('#' + bairro).attr('readonly', true);
                    }

                    $('#' + cidade).val(unescape(resultadoCEP["localidade"]));
                    if (unescape(resultadoCEP["localidade"]) !== '') {
                        $('#' + cidade).attr('readonly', true);
                    }

                    $('#' + estado).val(converteNomeEstados(unescape(resultadoCEP["uf"])));
                    if (unescape(resultadoCEP["uf"]) !== '') {
                        $('#' + estado).attr('readonly', true);
                    }

                    $('.endereco').removeClass('oculto').fadeIn('slow');

                } else if (resultadoCEP.erro){
                    swal("", 'Erro! CEP não encontrado.', "warning");
                }
            });
        }
    }
</script>
