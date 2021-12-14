<?php
    require 'conexao.php';

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados)) {
        $query = "INSERT INTO tb_produtos(nome, categoria, descricao, imagem) VALUES ('" . $dados['nome'] . "', '" . $dados['categoria'] . "', '" . $dados['descricao'] . "', '" . $dados['arquivo'] . "')";
        $cad_produto = $pdo->prepare($query);
        $cad_produto->execute();
        if($cad_produto->rowCount()) {
            echo "<script>alert('Produto cadastrado com sucesso!'); window.location='../adm/cadastro_produtos.php'</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar a categoria.<br>Tente novamente!'); window.location='../adm/cadastro_produtos.php'</script>";
        }
    }
?>