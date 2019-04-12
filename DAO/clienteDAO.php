<?php 
    require("conn.php");

    class ClienteDAO{
        function insert($cliente){
            $conexao = conectar();
            $query = "INSERT INTO Cliente (nome, tel1, tel2, cep, rua, num, complemento, bairro, cidade, estado) VALUES (?,?,?,?,?,?,?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ssssssssss",$cliente['nome'], $cliente['tel1'], $cliente['tel2'], $cliente['cep'], $cliente['rua'], $cliente['num'], $cliente['complemento'], $cliente['bairro'], $cliente['cidade'], $cliente['estado']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function update($cliente){
            $conexao = conectar();
            $query = "UPDATE Cliente SET nome = ? , tel1 = ?, tel2 = ?, cep = ?, rua = ?, num = ?, complemento = ?, bairro = ?, cidade = ?, estado = ? WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ssssssssssi",$cliente['nome'], $cliente['tel1'], $cliente['tel2'], $cliente['cep'], $cliente['rua'], $cliente['num'], $cliente['complemento'], $cliente['bairro'], $cliente['cidade'], $cliente['estado'], $cliente['id']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function remove($id){
            $conexao = conectar();
            $query = "DELETE FROM Cliente WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i", $id);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar($busca){
            $conexao = conectar();
            $busca = "%" . $busca . "%";
            $query = "SELECT * FROM Cliente WHERE UPPER(nome) LIKE UPPER(?) ORDER BY nome ASC;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$busca);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function get($id){
            $conexao = conectar();
            $query = "SELECT * FROM Cliente WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i", $id);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }
    }
?>