<?php
    require "../DAO/conn.php";
    header('Content-Type: text/html; charset=utf-8');
    $imagem = $_FILES['imagem'];
    $email  = $_POST['email'];
    $id     = $_POST['id'];

    if($imagem['type'] == "image/jpg" || $imagem['type'] == "image/jpeg" || $imagem['type'] == "image/png" || $imagem['type'] == "image/gif" || $imagem['type'] == "image/bmp"){
        $nomeTemp = $imagem['tmp_name'];
        $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);

        session_start();
        $conexao = conectar();

        $nomeImagem = $email . "." . $extensao;
        $caminhoImagem = 'img/usuario/' . $nomeImagem;
        
        $query = "UPDATE usuario SET foto = ? WHERE email = ?;";
        $stmt = mysqli_prepare($conexao,$query);
        mysqli_stmt_bind_param($stmt,"ss",$caminhoImagem,$email);
        $resultado = executar_SQL($conexao,$stmt);

        move_uploaded_file($nomeTemp, '../'.$caminhoImagem);

        header('Location:../perfilUsuario.php?id=' . $id);
    } else {
        header('Location:../perfilUsuario.php');
    }
?>