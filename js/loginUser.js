const addressEndpointLogin = 'http://localhost:3733/api/Login';

$("#btnEntrar").click(function loginUser() {
    event.preventDefault();
    var jsonData = buildingJson();
    sendDataApi(jsonData);
});

function buildingJson() {
    var email = $("#loginEmail").val();
    var password = $("#loginPassword").val();

    var jsonData = {
        email: email,
        password: password
    }

    return jsonData;
}

function sendDataApi(jsonData) {
    $.ajax({
        type: "POST",
        url: addressEndpointLogin,
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify(jsonData),
        success: function (data) {
           console.log("Dados enviados com sucesso!");
           console.log(data);
       }
    });
}

// pegar o valor do retorno, ver documentação de jquery ajax
// depois de pegar esse valor, armazenar ele em local storage ou session
// ver como fazer para ler os dados contidos dentro do token do json