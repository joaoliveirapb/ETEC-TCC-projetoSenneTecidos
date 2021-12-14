<?php
    require '../php/verifica.php';

    if(isset($_SESSION['idAdmin']) && !empty($_SESSION['idAdmin'])):

    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM - Senne Tecidos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/adm.css">
    <!-- Ícones Font Awesome -->
    <script src="https://kit.fontawesome.com/88711d03e5.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Menu -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Senne Tecidos</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="produtos.php">Produtos</a>
                </li>
                <li class="active">
                    <a href="categorias.php">Categorias</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="../php/logout.php" class="logout">Sair</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                </div>
            </nav>

            <div class="d-flex justify-content-between">
                <h2>Alteração de Categorias</h2>
            </div>

            <div class="dropdown-divider"></div>

            <form action="../php/alterar_categoria.php" method="POST">

            <?php
                $consulta = $pdo->query("SELECT * FROM tb_categoria WHERE id_categoria = $id");
                $row = $consulta->fetch();
            ?>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="nome">ID</label>
                        <input type="text" class="form-control" id="id_categoria" value="<?php echo $row['id_categoria'] ?>" name="id_categoria" placeholder="Nome da Categoria" readonly>
                    </div>
                    <div class="form-group col-md-10">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome_categoria" value="<?php echo $row['nome'] ?>" name="nome_categoria" placeholder="Nome da Categoria" required>
                    </div>
                </div>
                <button type="submit" name="atualizar" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-secondary">Cancelar</button>
            </form>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script type="text/javascript" src="../js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <!-- JS Main -->   
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/data-table.js"></script>
</body>
</html>

<?php
    else: header("location: ../adm/index.php"); endif;
?>