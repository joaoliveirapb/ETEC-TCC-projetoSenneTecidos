<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM - Senne Tecidos | Recuperação de Senha</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/adm.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <header class="bg-light fixed-top px-5 box-shadow">
        <div class="p-1">
            <img src="../images/logo-preto.png" alt="Senne Tecidos">
        </div>
    </header>

    <section class="container py-5">
        <div class="card login-container">
            <div class="card-header text-center bg-dark text-white">
                <h5>RECUPERAÇÃO DE SENHA</h5>
            </div>
            <div class="card-body">
                <form action="../php/esqueceu_senha.php" method="POST">
                    <div class="form-group">
                      <label for="loginEmail">E-mail</label>
                      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite seu email" required>
                    </div>
                    <button type="submit" id="btnEnviar" class="btn btn-block btn-primary mt-2">ENVIAR</button>
                </form>
            </div>
          </div>
    </section>
</body>
</html>