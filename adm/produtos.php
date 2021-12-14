<?php
    require '../php/verifica.php';

    if(isset($_SESSION['idAdmin']) && !empty($_SESSION['idAdmin'])):
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
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
                <li class="active">
                    <a href="produtos.php" data-toggle="collapse" aria-expanded="false">Produtos</a>
                </li>
                <li>
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
                <h2>Produtos</h2>
                <a class="btn btn-success" href="cadastro_produtos.php">Cadastrar</a>
            </div>

            <div class="dropdown-divider"></div>

            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Ajustes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $consulta = $pdo->query("SELECT * FROM tb_produtos");
                        while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {  
                    ?>
                    <tr>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['categoria']; ?></td>
                        <td><?php echo $row['descricao']; ?></td>
                        <td><img src="../images/<?php echo $row['imagem']; ?>" style="width: 150px;"></td>
                        <td>
                            <a href="<?php echo "alterar_produtos.php?id={$row['id_produtos']}" ?>" class="btn btn-block btn-primary text-light font-weight-bold">Editar</a>
                            <a href="<?php echo "../php/deletar_produto.php?id={$row['id_produtos']}" ?>" class="btn btn-block btn-danger text-light font-weight-bold">Excluir</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script type="text/javascript" src="../js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <!-- JS Main -->   
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/data-table.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</body>
</html>

<?php
    else: header("location: ../adm/index.php"); endif;
?>