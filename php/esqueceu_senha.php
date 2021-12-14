<?php
    require 'conexao.php';

    $email = $_POST['email'];

    $consulta = $pdo->query("SELECT email,senha FROM tb_admin WHERE email = '$email'");
    if($consulta->rowCount() == 0) {
        echo "<script>alert('E-mail não cadastrado!'); window.location='../adm/recuperacao_senha.php'</script>";
    } else {
        echo "<script>alert('Ok'); window.location='../adm/recuperacao_senha.php'</script>";
    }
?>