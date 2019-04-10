<?php require "../DAO/clienteDAO.php";

    $cliente['nome']        = $_POST['nome'];
    $cliente['tel1']        = $_POST['tel1'];
    $cliente['tel2']        = $_POST['tel2'];
    $cliente['cep']         = $_POST['cep'];
    $cliente['rua']         = $_POST['rua'];
    $cliente['num']         = $_POST['num'];
    $cliente['complemento'] = $_POST['complemento'];
    $cliente['bairro']      = $_POST['bairro'];
    $cliente['cidade']      = $_POST['cidade'];
    $cliente['estado']      = $_POST['estado'];

   // $origem = $_POST['origem'];

    //$location = $origem == "nav" ? "Location:../index.php" : "Location:../adminUsuarios.php";
    $location = "Location:../clientes.php";

    $clienteDAO = new ClienteDAO();
    $clienteDAO->insert($cliente);

    header($location . '?msg=sucesso');
?>