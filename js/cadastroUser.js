const addressEndpointCadastro = 'http://localhost:3733/api/Client';

$("#btnCadastro").click(function cadastroUser() {
    var senha = document.getElementById('senha').value,
    confSenha = document.getElementById('confSenha').value;

    if (senha != confSenha) {
        alert('Senhas Divergentes!\nAs senhas precisam ser iguais')
    } else {
        event.preventDefault();
        var jsonData = buildingJson();
        sendDataApi(jsonData);
    }
});

function buildingJson() {
    var nome = $("#nome").val();
    var sobrenome = $("#sobrenome").val();
    var cpf = $("#cpf").val().replace(/[^0-9]/g, "");
    var dataDeNascimento = $("#dataDeNascimento").val();
    var Genero = $("#Genero").val();
    var telefone = $("#telefone").val().replace(/[^0-9]/g, "");
    var CEP = $("#CEP").val().replace(/[^0-9]/g, "");
    var endereco = $("#endereco").val();
    var numero = $("#numero").val();
    var cidade = $("#cidade").val();
    var email = $("#email").val();
    var senha = $("#senha").val();

    var jsonData = {
        name: nome,
        surname: sobrenome,
        cpf: cpf,
        birthDate: dataDeNascimento,
        genre: Genero,
        phone: telefone,
        cep: CEP,
        address: endereco,
        numberAddress: numero,
        city: cidade,
        email: email,
        password: senha
    }

    return jsonData;
}

function sendDataApi(jsonData) {
    $.ajax({
        type: "POST",
        url: addressEndpointCadastro,
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify(jsonData),
        success: function (data) {
           console.log("Dados enviados com sucesso!");
           console.log(data);
       }
    });
}