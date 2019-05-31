<?php
	
	session_start();

   	unset($_SESSION['produtos']);
    header('Location: ../vendas.php?msg=carrinhovazio');
?>