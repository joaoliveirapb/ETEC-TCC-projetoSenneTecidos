<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senne Tecidos | A Senne Tecidos</title>
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
                    <a class="nav-link active" href="sennetecidos.php">A Senne Tecidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cama.php">Cama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mesa.php">Mesa</a>
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
                    <button type="button" id="btnEntrar" class="btn btn-primary">Entrar</button>
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

    <!-- Conteúdo -->
    <section class="container-fluid p-0 bg-light">
        <div class="p-4 text-center">
            <h2 class="display-4 d-block">Conheça a Senne Tecidos</h2>
        </div>

        <div class="aSenne">
            <div class="row">
                <div class="col-lg-6 col-12 p-5" style="margin: auto 0;">
                    <img src="images/logo-preto.png" alt="Senne Tecidos" class="bgASenne">
                    <p class="fraseASenne">"Nós somos do tecido de que são feitos os sonhos."</p>
                </div>
                <div class="col-lg-6 col-12 p-5">
                    <h2 class="historia-title text-center">História</h2>
                    <p class="historia-item text-justify">
                        Fundada em 2018, a empresa Senne Tecidos é inspirada em inovação e qualidade. O atendimento de qualidade foi destaque nos primeiros anos da empresa que a princípio ocupava um pequeno salão.
                        Na atualidade, ela ocupa um espaço mais ampliado e com variedade de produtos entre eles cama- mesa- banho e agora com a área de armarinhos com itens completos de costura e crochê.
                        O estabelecimento ganhou olhares com a identidade visual baseada nas cores azul e dourado que remetem a conforto, que em tempos de pandemia se adaptou a demanda dos seus consumidores com entrega a distância e métodos que facilitavam a chegada do produto ao cliente.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 bg-light text-center anime">
        <div class="container">
            <div class="col-md p-4">
                <h2 class="missao-title">Missão</h2>
                <P class="missao-item">
                    Inicialmente o propósito da loja Senne tecidos é atender os profissionais que atuam na área têxtil de Caieiras. Na qual podemos fornecer produtos de decoração/cama-mesa- banho e armarinhos, em virtude do efeito se tornar uma loja varejista com um parâmetro melhor da região.
                </P>
            </div>
            <div class="dropdown-divider"></div>
            <div class="col-md p-4">
                <h2 class="visao-title">Visão</h2>
                <P class="visao-item">
                    Melhorar o atendimento on-line através da criação de um site para loja, aperfeiçoar as entregas para que sejam feitas o mais rápido possível, investir em tecidos de qualidade superior e na sua variedade, aumentar a garantia dos produtos, realizar todas essas mudanças colocando um preço justo e expandir nosso público-alvo.
                </P>
            </div>
            <div class="dropdown-divider"></div>
            <div class="col-md p-4">
                <h2 class="valores-title">Valores</h2>
                <P class="valores-item">
                    Nossos valores são dos mais variáveis, e prezam por respeito, inclusão social, empatia, solidariedade, integridade, adaptação, flexibilidade e facilidade.
                </P>
            </div>

            <div class="col-md p-5">
                <h2 class="loja-fisica">Loja Fisíca</h2>
                <iframe class="p-4" src="https://www.google.com/maps/embed?pb=!4v1637708377479!6m8!1m7!1sCAoSLEFGMVFpcE9SWVZIRWZtUkJIdEhtNnBhZVBTS2s4Y2M5S3kzNm1UbjFIcUFG!2m2!1d-23.390344!2d-46.7148496!3f78.1087715842609!4f-16.81383887622698!5f0.7820865974627469" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- JS Main -->   
<script type="text/javascript" src="js/main.js"></script>
<!-- Botão WhatsApp -->
<script>window.rwbp={email:'sennetecidos@gmail.com',phone:'+5511961319195',message:'Olá! Preencha os campos abaixo para iniciar a conversa no WhatsApp',lang:'pt-BR'}</script><script defer async src='https://duz4dqsaqembt.cloudfront.net/client/whats.js'></script>
<script type="text/javascript" src="js/loginUser.js"></script>
</body>
</html>