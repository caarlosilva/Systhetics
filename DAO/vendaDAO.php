<?php 
    require("conn.php");

    class VendaDAO{
        function insert($venda){
            $conexao = conectar();
            session_start();
            $data = time();
            $query = "INSERT INTO Venda (id_usuario, data, total) VALUES (?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"isd",$_SESSION['id'],$data,$venda['total']);
            executar_SQL($conexao,$stmt);
            
            $limit = 1;
            $query = "SELECT * FROM Venda ORDER BY id DESC LIMIT ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$limit);
            $resultado = executar_SQL($conexao,$stmt);
            $idVenda = lerResultado($resultado)[0];
            
            $carrinho = $_SESSION['produtos'];
            foreach ($carrinho as $prod) {
                $query = "INSERT INTO ProdutosVenda (id_venda, id_produto, qtd_venda, precoVenda) VALUES (?,?,?,?);";
                $stmt = mysqli_prepare($conexao,$query);
                mysqli_stmt_bind_param($stmt,"iidd", $idVenda['id'],$prod['id'],$prod['qtdVenda'],$prod['precoVenda']);
                executar_SQL($conexao,$stmt);

                $query = "UPDATE Produto SET quantidade = (quantidade - ?) WHERE id = ?;";
                $stmt = mysqli_prepare($conexao,$query);
                mysqli_stmt_bind_param($stmt,"di", $prod['qtdVenda'],$prod['id']);
                executar_SQL($conexao,$stmt);
            }           
            desconectar($conexao);
        }

        function get($id){
            $conexao = conectar();
            $query = "SELECT * FROM Venda WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i", $id);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }
    }
?>