<?php
    $id = $_GET['id'];
    
    require 'conexao.php';

    $query = "DELETE FROM tb_produtos WHERE id_produtos = $id";
    $delete = $pdo->query($query);
    if($delete == true) {
        echo "<script>alert('Produto excluído com sucesso!'); window.location='../adm/produtos.php'</script>";
    } else {
        echo "<script>alert('Falha ao tentar excluir.<br>Tente novamente!!!'); window.location='../adm/produtos.php'</script>";
    }
?>