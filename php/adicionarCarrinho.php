<?php

    $id 		= $_POST['idProduto'];
    $qtdVenda 	= $_POST['qtdVenda'];

    session_start();

    $_SESSION['produtos'][$id]['id']		 = $id;
    $_SESSION['produtos'][$id]['qtdVenda'] 	 = $qtdVenda;

    header('Location: ../vendas.php?msg=prodadd');
?>