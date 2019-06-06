<?php 
    require("conn.php");

    class ServicoDAO{
        function insert($servico){
            $conexao = conectar();
            $query = "INSERT INTO Servico (nome, descricao, preco, tipo) VALUES (?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ssds",$servico['nome'],$servico['descricao'],$servico['preco'],$servico['tipo']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function update($servico){
            $conexao = conectar();
            $query = "UPDATE Servico SET nome = ?, descricao = ?, preco = ?, tipo = ? WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ssdsi",$servico['nome'],$servico['descricao'],$servico['preco'],$servico['tipo'],$servico['id']);                     
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function remove($id){
            $conexao = conectar();
            $query = "DELETE FROM Servico WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$id);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar($busca){
            $conexao = conectar();
            $busca = "%" . $busca . "%";
            $query = "SELECT * FROM Servico WHERE UPPER(nome) LIKE UPPER(?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$busca);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function get($id){
            $conexao = conectar();
            $query = "SELECT id, nome, descricao, preco, tipo, foto FROM Servico WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$id);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }
    }
?>