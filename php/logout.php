<?php
    session_start();

    unset($_SESSION['idAdmin']);

    header("location: ../adm/index.php");
?>