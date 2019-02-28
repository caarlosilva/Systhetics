<?php require "../DAO/UserDAO.php";

    $usuario['email'] = $_POST['inputEmail'];
    $usuario['nome'] = $_POST['inputName'];
    $usuario['tel1'] = $_POST['inputTel1'];
    $usuario['tel2'] = $_POST['inputTel2'];
    $senha = $_POST['inputPassword'];
    $confirmar = $_POST['inputConfirmPassword'];
    $usuario['admin'] = $_POST['admin'];
   // $origem = $_POST['origem'];

    //$location = $origem == "nav" ? "Location:../index.php" : "Location:../adminUsuarios.php";
    $location = "Location:../index.php";

    if($senha != $confirmar){
        header($location . '?msg=errosenha');
        exit;
    }

    $usuarioDAO = new UserDAO();

    if(count($usuarioDAO->get($usuario['email']) > 0)){
        header($location . '?msg=erroemail');
    }

    //$senhahash = md5($senha);
    $usuario['senha'] = $senha;

    $usuarioDAO->insert($usuario);

    header($location . '?msg=sucesso');
?>