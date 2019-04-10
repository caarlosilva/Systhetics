<?php require "../DAO/UserDAO.php";

    $usuario['email']   = $_POST['inputEmail'];
    $usuario['nome']    = $_POST['inputName'];
    $usuario['tel1']    = $_POST['inputTel1'];
    $usuario['tel2']    = $_POST['inputTel2'];
    $usuario['admin']   = $_POST['inputTipo'];
    $senhaAtual         = $_POST['inputCurrentPassword'];
    $senha              = $_POST['inputPassword'];
    $confirmar          = $_POST['inputConfirmPassword'];
    $operacao           = $_POST['operacao'];

    $userDAO = new UserDAO();

    if ($operacao == "atualizar") {
        $user = $userDAO->get($usuario['email']);

        if($senhaAtual != "" && $senha != "" && $confirmar != ""){
            if($senhaAtual != $user['senha'] || $senha != $confirmar ){
                header('Location:../perfilUsuario.php?msg=errosenha');
            exit;
            }
        }   
        $usuario['senha'] = $senha;
        $userDAO->update($usuario);
        header('Location:../perfilUsuario.php?id=' . $user['id']);
    }elseif ($operacao == "remover") {
        $userDAO->remove($usuario['email']);
        header('Location:../usuarios.php?msg=usuarioremovido');
    }else{

    }
     
?>