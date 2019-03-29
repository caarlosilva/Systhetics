<?php
    require "../DAO/conn.php";
    require "../DAO/userDAO.php";
    session_start();

    $email = $_POST["inputEmail"];
    $senha = $_POST["inputPassword"];

    $userDAO = new UserDAO();

    if($userDAO->login($email,$senha)){
        $usuario = $userDAO->get($email);
        $_SESSION['id']     =   $usuario['id'];
        $_SESSION['email']  =   $usuario['email'];
        $_SESSION['nome']   =   $usuario['nome'];
        $_SESSION['senha']  =   $usuario['senha'];
        $_SESSION['tel1']   =   $usuario['tel1'];
        $_SESSION['tel2']   =   $usuario['tel2'];
        $_SESSION['admin']  =   $usuario['admin'];
        $_SESSION['foto']   =   $usuario['foto'];
        if($_SESSION['admin'] == 1){ //1 = admin, 0 = user
            header('Location:../dashboard.php');                 
        }
        elseif($_SESSION['admin'] == 0){
            header('Location:../index.php?msg=usernormal');
        }
        else{
            header('Location:../index.php?msg=errologin');
        }
    }else{
        header('Location:../index.php?msg=errologin');
    }
?>