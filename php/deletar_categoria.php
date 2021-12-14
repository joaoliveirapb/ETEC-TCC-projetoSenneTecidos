<?php
    $id = $_GET['id'];
    
    require 'conexao.php';

    $query = "DELETE FROM tb_categoria WHERE id_categoria = $id";
    $delete = $pdo->query($query);
    if($delete == true) {
        echo "<script>alert('Categoria excluído com sucesso!'); window.location='../adm/categorias.php'</script>";
    } else {
        echo "<script>alert('Falha ao tentar excluir.<br>Tente novamente!!!'); window.location='../adm/categorias.php'</script>";
    }
?>