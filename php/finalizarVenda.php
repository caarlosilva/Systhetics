<?php require "../DAO/vendaDAO.php";

    $venda['total']        = $_POST['total'];

    //document.getElementById("demo").innerHTML = x;

    $vDAO = new VendaDAO();

    $vDAO->insert($venda);
    session_start();
    unset($_SESSION['produtos']);
    header("Location:../vendas.php?msg=sucesso");
?>