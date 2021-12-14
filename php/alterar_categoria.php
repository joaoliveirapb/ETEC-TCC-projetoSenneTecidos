<?php
    require 'conexao.php';

    if(isset($_POST['atualizar'])) {
        $id = $_POST['id_categoria'];
        $nome_categoria = $_POST['nome_categoria'];

        $query = "UPDATE tb_categoria SET nome='$nome_categoria' WHERE id_categoria = $id";
        $alt_categoria = $pdo->prepare($query);
        $alt_categoria->execute();

        if($alt_categoria) {
            echo "<script>alert('Categoria atualizada com sucesso!'); window.location='../adm/categorias.php'</script>";
        } else {
            echo "<script>alert('Erro ao atualizar.<br>Tente novamente!!!'); window.location='../adm/alterar_categoria.php'</script>";
        }
    }
?>