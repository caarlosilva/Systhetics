<?php
    require "../DAO/conn.php";
    header('Content-Type: text/html; charset=utf-8');
    $imagem = $_FILES['imagem'];
    $id     = $_POST['id'];

    if($imagem['type'] == "image/jpg" || $imagem['type'] == "image/jpeg" || $imagem['type'] == "image/png" || $imagem['type'] == "image/gif" || $imagem['type'] == "image/bmp"){
        $nomeTemp = $imagem['tmp_name'];
        $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);

        session_start();
        $conexao = conectar();

        $nomeImagem = $id . "." . $extensao;
        $caminhoImagem = 'img/cliente/' . $nomeImagem;
        
        $query = "UPDATE Cliente SET foto = ? WHERE id = ?;";
        $stmt = mysqli_prepare($conexao,$query);
        mysqli_stmt_bind_param($stmt,"si",$caminhoImagem,$id);
        $resultado = executar_SQL($conexao,$stmt);

        move_uploaded_file($nomeTemp, '../'.$caminhoImagem);

        header('Location:../perfilCliente.php?id=' . $id);
    } else {
        header('Location:../perfilCliente.php');
    }
?>