<?php
    require 'conexao.php';

    $nome_cadastro = $_POST['nome_categoria'];

    if(!empty($nome_cadastro)) {
        $query = "INSERT INTO tb_categoria(nome) VALUES ('" . $nome_cadastro . "')";
        $cad_categoria = $pdo->prepare($query);
        $cad_categoria->execute();
        if($cad_categoria->rowCount()) {
            echo "<script>alert('Categoria cadastrada com sucesso!'); window.location='../adm/cadastro_categorias.php'</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar a categoria.<br>Tente novamente!'); window.location='../adm/cadastro_categorias.php'</script>";
        }
    }
?>