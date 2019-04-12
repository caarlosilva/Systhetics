<?php require "../DAO/produtoDAO.php";
    
    $produto['id']          = $_POST['idProd'];
    $produto['nome']        = $_POST['nome'];
    $produto['preco']       = $_POST['preco'];
    $produto['quantidade']  = $_POST['quantidade'];
    $produto['descricao']   = $_POST['descricao'];
    $operacao               = $_POST['operacao'];
    $remover                = $_POST['remover'];

    $produtoDAO = new ProdutoDAO();

    if ($remover == "remover") {
        $produtoDAO->remove($produto['id']);
        header('Location:../produtos.php?msg=produtoremovido');
        exit;
    }

    if ($operacao == "atualizar" AND $remover != "remover") { 
        $produtoDAO->update($produto);
        header('Location:../produtos.php?id=' . $produto['id']);
    }

     
?>