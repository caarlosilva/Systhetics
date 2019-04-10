<?php
    require "../DAO/conn.php";
    require "../DAO/userDAO.php";

    $usuario['email'] = $_POST['email'];

    $userDAO = new UserDAO();

    $usuario = $userDAO->get($email);
    if($_SESSION['admin'] == 1){ //1 = admin, 0 = user
        header('Location:../perfilUsuario.php');                 
    }
    elseif($_SESSION['admin'] == 0){
        header('Location:../perfilUsuario.php');
    } 
?>