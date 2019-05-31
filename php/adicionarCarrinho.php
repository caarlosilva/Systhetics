<?php

    $id 		= $_POST['idProduto'];
    $precoVenda = $_POST['precoVenda'];
    $qtdVenda 	= $_POST['qtdVenda'];

    session_start();

    $_SESSION['produtos'][$id]['id']		 = $id;
    $_SESSION['produtos'][$id]['precoVenda'] = $precoVenda;
    $_SESSION['produtos'][$id]['qtdVenda'] 	 = $qtdVenda;

    header('Location: ../vendas.php?msg=prodadd');
?>