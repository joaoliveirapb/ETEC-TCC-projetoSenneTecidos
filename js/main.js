$(window).scroll(function() {
    var windowTop = $(this).scrollTop()
    $('.anime').each(function() {
        if (windowTop > $(this).offset().top - 500) {
            $(this).addClass('anime-init')
        } else {
            $(this).removeClass('anime-init')
        }
    })
})

//Máscara do cadastro
$(document).ready(function(){
    //$("#CPF").mask("000.000.000-00");
    $("#telefone").mask("(00) 00000-0000");
    $("#CEP").mask("00000-000")
})

//Validação CPF
function is_cpf (c) {

    if((c = c.replace(/[^\d]/g,"")).length != 11)
      return false
  
    if (
        c == "00000000000" ||
        c == "11111111111" ||
        c == "22222222222" ||
        c == "33333333333" ||
        c == "44444444444" ||
        c == "55555555555" ||
        c == "66666666666" ||
        c == "77777777777" ||
        c == "88888888888" ||
        c == "99999999999"
        )
      return false;
  
    var r;
    var s = 0;
  
    for (i=1; i<=9; i++)
      s = s + parseInt(c[i-1]) * (11 - i);
  
    r = (s * 10) % 11;
  
    if ((r == 10) || (r == 11))
      r = 0;
  
    if (r != parseInt(c[9]))
      return false;
  
    s = 0;
  
    for (i = 1; i <= 10; i++)
      s = s + parseInt(c[i-1]) * (12 - i);
  
    r = (s * 10) % 11;
  
    if ((r == 10) || (r == 11))
      r = 0;
  
    if (r != parseInt(c[10]))
      return false;
  
    return true;
  }
  
  
  function fMasc(objeto,mascara) {
  obj=objeto
  masc=mascara
  setTimeout("fMascEx()",1)
  }
  
    function fMascEx() {
  obj.value=masc(obj.value)
  }
  
  function mCPF(cpf){
  cpf=cpf.replace(/\D/g,"")
  cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
  cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
  cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
  return cpf
  }

  cpfCheck = function (el) {
    document.getElementById('cpfResponse').innerHTML = is_cpf(el.value)? '<span style="color:green"></span>' : '<span style="color:red">CPF Inválido</span>';
    if(el.value=='') document.getElementById('cpfResponse').innerHTML = '';
}

//Validação CEP
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('endereco').value=("");
    document.getElementById('cidade').value=("");
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('endereco').value=(conteudo.logradouro);
    document.getElementById('cidade').value=(conteudo.localidade);
} //end if.
else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('endereco').value="...";
        document.getElementById('cidade').value="..."

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
} //end if.
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
}

//Validação de Senha
function validarSenha () {
    var senha = document.getElementById('senha').value,
    confSenha = document.getElementById('confSenha').value;

    if (senha != confSenha) {
        alert('Senhas Divergentes!\nAs senhas precisam ser iguais')
    } else {
        document.FormSenha.submit();
    }
}