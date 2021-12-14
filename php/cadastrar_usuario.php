<?php
    require 'conexao.php';

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados)) {
        $empty_input = false;

        $dados = array_map('trim', $dados);
        if(in_array("", $dados)) {
            $empty_input = true;
            echo "<script>alert('Necessário preencher todos os campos!!!'); window.location='../cadastro.php'</script>";
        } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $empty_input = true;
            echo "<script>alert('Necessário preencher com e-mail válido!'); window.location='../cadastro.php'</script>";
        }

        if(!$empty_input) {
            $query = "INSERT INTO tb_usuario(nome, sobrenome, cpf, nascimento, genero, telefone, cep, endereco, numero, cidade, email, senha) VALUES ('" . $dados['nome'] . "', '" . $dados['sobrenome'] . "', '" . $dados['cpf'] . "', '" . $dados['nascimento'] . "', '" . $dados['genero'] . "', '" . $dados['telefone'] . "', '" . $dados['cep'] . "', '" . $dados['endereco'] . "', '" . $dados['numero'] . "', '" . $dados['cidade'] . "', '" . $dados['email'] . "', '" . md5($dados['senha']) . "')";
            $cad_usuario = $pdo->prepare($query);
            $cad_usuario->execute();
            if($cad_usuario->rowCount()) {
                echo "<script>alert('Cadastro efetuado com sucesso!'); window.location='../cadastro.php'</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar.<br>Tente novamente!'); window.location='../cadastro.php'</script>";
            }
        }
    }
?>