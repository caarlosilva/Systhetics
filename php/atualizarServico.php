<?php require "../DAO/servicoDAO.php";
    
    $servico['id']          = $_POST['idServ'];
    $servico['nome']        = $_POST['nome'];
    $servico['preco']       = $_POST['preco'];
    $servico['tipo']        = $_POST['tipo'];
    $servico['descricao']   = $_POST['descricao'];
    $operacao               = $_POST['operacao'];
    $remover                = $_POST['remover'];

    $servicoDAO = new ServicoDAO();

    if ($remover == "remover") {
        $servicoDAO->remove($servico['id']);
        header('Location:../servicos.php?msg=servicoremovido');
        exit;
    }

    if ($operacao == "atualizar" AND $remover != "remover") { 
        $servicoDAO->update($servico);
        header('Location:../servicos.php?id=' . $servico['id']);
    }

     
?>