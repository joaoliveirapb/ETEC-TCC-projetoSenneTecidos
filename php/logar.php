<?php
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
        require 'conexao.php';
        require 'Admin-class.php';

        $u = new Admin();

        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if($u->login($email, $senha) == true) {
            if(isset($_SESSION['idAdmin'])) {
                header("location: ../adm/produtos.php");
            } else {
                $_SESSION['nao_autenticado'] = true;
                header("location: ../adm/index.php");
            }
        } else {
            $_SESSION['nao_autenticado'] = true;
            header("location: ../adm/index.php");
        }
    } else {
        $_SESSION['nao_autenticado'] = true;
        header("location: ../adm/index.php");
    }
?>