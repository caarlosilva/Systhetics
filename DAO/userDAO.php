<?php 
    require("conn.php");

    class UserDAO{
        function insert($usuario){
            $conexao = conectar();
            $query = "INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES (?,?,?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"sssssi",$usuario['email'],$usuario['nome'],$usuario['senha'],$usuario['tel1'],$usuario['tel2'], $usuario['admin']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function update($usuario){
            $conexao = conectar();
            $query = "UPDATE Usuario SET nome = ? WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ss",$usuario['nome'],$usuario['email']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function updateSenha($usuario){
            $conexao = conectar();
            $query = "UPDATE Usuario SET senha = ? WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ss",$usuario['senha'],$usuario['email']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function updateAdmin($usuario){
            $conexao = conectar();
            $query = "UPDATE usuario SET admin = ? WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"is",$usuario['admin'],$usuario['email']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function remove($email){
            $conexao = conectar();
            $query = "DELETE FROM usuario WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$email);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar($busca){
            $conexao = conectar();
            $busca = "%" . $busca . "%";
            $query = "SELECT * FROM Usuario WHERE UPPER(nome) LIKE UPPER(?) ORDER BY admin DESC, nome ASC;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$busca);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function get($email){
            $conexao = conectar();
            $query = "SELECT email, nome, senha, tel1, tel2, admin FROM usuario WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$email);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }

        function login($email,$senha){
            $conexao = conectar();
            $query = "SELECT * FROM usuario WHERE email = ? AND senha = ?;";
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

        function countAdmin(){
            $conexao = conectar();
            $query = "SELECT * FROM usuario WHERE admin = 1;";
            $stmt = mysqli_prepare($conexao,$query);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return count(lerResultado($resultado));
        }
    }
?>