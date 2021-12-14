<?php
    require 'php/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senne Tecidos | Mesa</title>
    <!-- Ícone Navegador -->
    <link rel="shortcut icon" href="images/icone.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Ícones Font Awesome -->
    <script src="https://kit.fontawesome.com/88711d03e5.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top px-5 box-shadow">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo-dourado.png" alt="Senne Tecidos">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Abrir navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="sennetecidos.php">A Senne Tecidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cama.php">Cama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="mesa.php">Mesa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="banho.php">Banho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="acessorios.php">Acessórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contato">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLogin"><i class="fas fa-user"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Modal Login -->
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Acesse sua Conta</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                      <label for="loginEmail">E-mail</label>
                      <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <label for="loginPassword">Senha</label>
                      <input type="password" class="form-control" id="loginPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <small class="form-text text-muted">Esqueceu a senha? <a href="#">Clique Aqui</a>.</small>
                </form>
            </div>
            <div class="modal-footer justify-content-start">
                <a href="cadastro.php" class="btn btn-success">Cadastre-se</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
    </div>

    <!-- Carousel -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="images/carrossel-mesa.png" alt="Primeiro Slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="images/carrossel-sec.png" alt="Segundo Slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="images/carrossel-terc.png" alt="Terceiro Slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Produtos -->
    <section class="py-5 bg-light text-center">
        <div class="container">
            <div class="py-3 informacao">
                <span class="h5 d-block bg-dark text-light"><b>MESA</b></span>
            </div>

            <div class="row pt-5 text-dark anime">
                <?php
                    $consulta = $pdo->query("SELECT * FROM tb_produtos WHERE categoria='mesa'");
                    while($row = $consulta->fetch()) {
                ?>

                <div class="col-xl-3 col-md-6 py-3">
                    <div class="border py-2 box-shadow item">
                        <a href="<?php echo "produto.php?id={$row['id_produtos']}" ?>"><img class="rounded" style="width: 230px; height: 250px;" src="images/<?php echo $row['imagem'] ?>"></a>
                        <p class="pt-3"><?php echo $row['nome'] ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-5">
                    <h5>MENU</h5>
                    <ul class="list-unstyled">
                        <li><a href="sennetecidos.php">A Senne Tecidos</a></li>
                        <li><a href="cama.php">Cama</a></li>
                        <li><a href="mesa.php">Mesa</a></li>
                        <li><a href="banho.php">Banho</a></li>
                        <li><a href="acessorios.php">Acessórios</a></li>
                        <li><a href="blog" target="_blank">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-5" id="contato">
                    <h5>CONTATO</h5>
                    <ul class="list-unstyled text-secondary">
                        <li><a href="https://web.whatsapp.com/send?phone=5511961319195" target="_blank"><i class="fab fa-whatsapp"></i> (11) 96131-9195</a></li>
                        <li><a href="tel:551148993302"><i class="fas fa-phone-alt"></i> (11) 4899-3302</a></li>
                        <li><a href="mailto:sennetecidos@gmail.com"><i class="far fa-envelope"></i> sennetecidos@gmail.com</a></li>
                        <li><i class="far fa-clock"></i> Seg. à Sex. - 9h às 18h<br>Sáb. - 10h às 17h</li>
                        <li><i class="fas fa-map-marker-alt"></i> Rua Ermênio de Oliveira Penteado, 441<br>Caieiras - SP, 07744-420</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>REDES SOCIAIS</h5>
                    <ul class="list-unstyled mt-3">
                        <li><a class="btn btn-outline-secondary btn-sm btn-block" href="https://www.facebook.com/Senne-Tecidos-2234822063245484" target="_blank" style="max-width: 140px"><i class="fab fa-facebook-square"></i> Facebook</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><a class="btn btn-outline-secondary btn-sm btn-block" href="https://www.instagram.com/sennetecidos/" target="_blank" style="max-width: 140px"><i class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-light text-center text-dark py-2">
            <p class="mb-0">© 2021 Senne Tecidos. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- JS Bootstrap -->
    <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- JS Main -->   
    <script type="text/javascript" src="js/main.js"></script>
    <!-- Botão WhatsApp -->
    <script>window.rwbp={email:'sennetecidos@gmail.com',phone:'+5511961319195',message:'Olá! Preencha os campos abaixo para iniciar a conversa no WhatsApp',lang:'pt-BR'}</script><script defer async src='https://duz4dqsaqembt.cloudfront.net/client/whats.js'></script>
</body>
</html>