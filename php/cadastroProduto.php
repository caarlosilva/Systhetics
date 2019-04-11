<?php require "../DAO/produtoDAO.php";

    $produto['nome']        = $_POST['nome'];
    $produto['preco']       = $_POST['preco'];
    $produto['quantidade']  = $_POST['quantidade'];
    $produto['descricao']   = $_POST['descricao'];

    //document.getElementById("demo").innerHTML = x;

    $produtoDAO = new ProdutoDAO();

    $produtoDAO->insert($produto);

    header("Location:../produtos.php?msg=sucesso");
?>