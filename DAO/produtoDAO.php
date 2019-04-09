<?php 
    require("conn.php");

    class ProdutoDAO{
        function insert($produto){
            $conexao = conectar();
            $query = "INSERT INTO produto (email, nome, senha, tel1, tel2, admin) VALUES (?,?,?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"sssssi",$produto['email'],$produto['nome'],$produto['senha'],$produto['tel1'],$produto['tel2'], $produto['admin']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function update($produto){
            $conexao = conectar();
            if($produto['senha'] != ""){
                $query = "UPDATE produto SET nome = ?, tel1 = ?, tel2 = ?, senha = ?, admin = ? WHERE email = ?;";
                $stmt = mysqli_prepare($conexao,$query);
                mysqli_stmt_bind_param($stmt,"ssssis",$produto['nome'],$produto['tel1'],$produto['tel2'],$produto['senha'],$produto['admin'],$produto['email']);
            }else{
                $query = "UPDATE produto SET nome = ?, tel1 = ?, tel2 = ?, admin = ? WHERE email = ?;";
                $stmt = mysqli_prepare($conexao,$query);
                mysqli_stmt_bind_param($stmt,"sssis",$produto['nome'],$produto['tel1'],$produto['tel2'],$produto['admin'],$produto['email']);
            }                      
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function updateSenha($produto){
            $conexao = conectar();
            $query = "UPDATE produto SET senha = ? WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ss",$produto['senha'],$produto['email']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function updateAdmin($produto){
            $conexao = conectar();
            $query = "UPDATE produto SET admin = ? WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"is",$produto['admin'],$produto['email']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function remove($email){
            $conexao = conectar();
            $query = "DELETE FROM produto WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$email);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar($busca){
            $conexao = conectar();
            $busca = "%" . $busca . "%";
            $query = "SELECT * FROM produto WHERE UPPER(nome) LIKE UPPER(?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$busca);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function get($email){
            $conexao = conectar();
            $query = "SELECT id, email, nome, senha, tel1, tel2, admin, foto FROM produto WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$email);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }

        function getById($id){
            $conexao = conectar();
            $query = "SELECT id, email, nome, senha, tel1, tel2, admin, foto FROM produto WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$id);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }

        function login($email,$senha){
            $conexao = conectar();
            $query = "SELECT * FROM produto WHERE email = ? AND senha = ?;";
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