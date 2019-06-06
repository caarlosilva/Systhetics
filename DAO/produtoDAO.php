<?php 
    require("conn.php");

    class ProdutoDAO{
        function insert($produto){
            $conexao = conectar();
            $query = "INSERT INTO Produto (nome, descricao, preco, quantidade) VALUES (?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ssdd",$produto['nome'],$produto['descricao'],$produto['preco'],$produto['quantidade']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function update($produto){
            $conexao = conectar();
            $query = "UPDATE Produto SET nome = ?, descricao = ?, preco = ?, quantidade = ? WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ssddi",$produto['nome'],$produto['descricao'],$produto['preco'],$produto['quantidade'],$produto['id']);                     
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function updateAdmin($produto){
            $conexao = conectar();
            $query = "UPDATE Produto SET admin = ? WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"is",$produto['admin'],$produto['email']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function remove($id){
            $conexao = conectar();
            $query = "DELETE FROM Produto WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$id);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar($busca){
            $conexao = conectar();
            $busca = "%" . $busca . "%";
            $query = "SELECT * FROM Produto WHERE UPPER(nome) LIKE UPPER(?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$busca);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function get($id){
            $conexao = conectar();
            $query = "SELECT id, nome, descricao, preco, quantidade, foto FROM Produto WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$id);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }


        function login($email,$senha){
            $conexao = conectar();
            $query = "SELECT * FROM Produto WHERE email = ? AND senha = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ss",$email,$senha);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            $senhabanco = lerResultado($resultado)[0]['senha'];

            if($senha != $senhabanco){
                return false;
            }else{
                return true;
            }
        }
    }
?>