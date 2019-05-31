<?php
    session_start();

    $_SESSION['id']     =   null;
    $_SESSION['id']     =   null;
    $_SESSION['email']  =   null;
    $_SESSION['nome']   =   null;
    $_SESSION['senha']  =   null;
    $_SESSION['tel1']   =   null;
    $_SESSION['tel2']   =   null;
    $_SESSION['admin']  =   null;
    $_SESSION['foto']   =   null;

    header('Location:../index.php?msg=logout');
    
?>