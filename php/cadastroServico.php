<?php require "../DAO/servicoDAO.php";

    $servico['nome']        = $_POST['nome'];
    $servico['preco']       = $_POST['preco'];
    $servico['tipo']        = $_POST['tipo'];
    $servico['descricao']   = $_POST['descricao'];

    //document.getElementById("demo").innerHTML = x;

    $servicoDAO = new ServicoDAO();

    $servicoDAO->insert($servico);

    header("Location:../servicos.php?msg=sucesso");
?>