<?php require "../DAO/clienteDAO.php";
    
    $cliente['id']          = $_POST['id'];
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
    $operacao               = $_POST['operacao'];

    $clienteDAO = new ClienteDAO();

    if ($operacao == "atualizar") { 
        $clienteDAO->update($cliente);
        header('Location:../perfilCliente.php?id=' . $cliente['id']);
    }

    elseif ($operacao == "remover") {
        $clienteDAO->remove($cliente['id']);
        header('Location:../clientes.php?msg=clienteremovido');
    }
    else{
        header('Location:../index.php');
    }

    

     
?>