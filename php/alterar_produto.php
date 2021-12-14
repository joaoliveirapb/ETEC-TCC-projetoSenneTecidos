<?php
  require 'conexao.php';

  if(isset($_POST['atualizar'])) {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $arquivo = $_POST['arquivo'];
    $id = $_POST['id'];

    $query = "UPDATE tb_produtos SET nome='$nome', categoria='$categoria', descricao='$descricao', imagem='$arquivo' WHERE id_produtos = $id";
    $alt_produto = $pdo->prepare($query);
    $alt_produto->execute();

    if($alt_produto) {
      echo "<script>alert('Produto atualizado com sucesso!'); window.location='../adm/produtos.php'</script>";
    } else {
      echo "<script>alert('Erro ao atualizar.<br>Tente novamente!!!'); window.location='../adm/produtos.php'</script>";
    }
  }
?>