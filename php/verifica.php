<?php
    require '../php/conexao.php';

    if(isset($_SESSION['idAdmin']) && !empty($_SESSION['idAdmin'])){
        require_once 'Admin-class.php';

        $u = new Admin();

        $listLogged = $u->logged($_SESSION['idAdmin']);

        $emailAdmin = $listLogged['email'];
    } else {
        header("location: ../adm/index.php");
    }
?>