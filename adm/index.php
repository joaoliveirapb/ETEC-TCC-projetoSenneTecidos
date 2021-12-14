<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM - Senne Tecidos | Login</title>

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
                <h5>DIGITE SEUS DADOS PARA ENTRAR</h5>
            </div>
            <?php
                if(isset($_SESSION['nao_autenticado'])):
            ?>
            <div class="alert alert-danger mt-1 text-center" role="alert">
                ERRO: E-mail ou senha inválidos!
            </div>
            <?php
                endif;
                unset($_SESSION['nao_autenticado']);
            ?>
            <div class="card-body">
                <form action="../php/logar.php" method="POST">
                    <div class="form-group">
                      <label for="loginEmail">E-mail</label>
                      <input type="email" class="form-control" name="email" id="loginEmail" aria-describedby="emailHelp" placeholder="Digite seu email" required>
                    </div>
                    <div class="form-group">
                      <label for="loginPassword">Senha</label>
                      <input type="password" class="form-control" name="senha" id="loginPassword" placeholder="Digite sua senha" required>
                    </div>
                    <small class="form-text text-muted">Esqueceu a senha? <a href="recuperacao_senha.php">Clique Aqui</a>.</small>
                    <button type="submit" id="btnEntrar" class="btn btn-block btn-primary mt-2">ENTRAR</button>
                </form>
            </div>
          </div>
    </section>
</body>
</html>