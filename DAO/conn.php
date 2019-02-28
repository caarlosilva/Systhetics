<?php
if(!defined('S_SERVIDOR')){
    define('S_SERVIDOR', 'localhost');
}
if(!defined('BD_USUARIO')){
    define('BD_USUARIO', 'root');
}
if(!defined('BD_SENHA')){
    define('BD_SENHA', '');
}
if(!defined('BD_BASEDEDADOS')){
    define('BD_BASEDEDADOS', 'systhetics');
}

if(!function_exists('conectar')){
    function conectar(){
        $conexao_sgbd = mysqli_connect(S_SERVIDOR, BD_USUARIO, BD_SENHA);
        if(!$conexao_sgbd)
            die('Erro: ' . mysqli_error ($conexao_sgbd));

        $conexao_base = mysqli_select_db($conexao_sgbd, BD_BASEDEDADOS);
        if(!$conexao_base)
            die('Erro: ' . mysqli_error ($conexao_sgbd));

        mysqli_set_charset($conexao_sgbd,"utf8mb4");
        mysqli_query($conexao_sgbd,"SET NAMES 'utf8mb4'");
        
        return $conexao_sgbd;
    }
}

if(!function_exists('desconectar')){
    function desconectar($conexao){
        mysqli_close($conexao);
    }
}

if(!function_exists('executar_SQL')){
    function executar_SQL($conexao, $stmt){
        $conexao = conectar();
        mysqli_stmt_execute($stmt) or die("Falha ao executar a consulta: " . $stmt->error);
        $resultado = mysqli_stmt_get_result($stmt);
        return $resultado;
    }
}

if(!function_exists('lerResultado')){
    function lerResultado($resultado){
        $arrayResultado = [];
        for($i=0;$i<mysqli_num_rows($resultado);$i++){
            $arrayResultado[$i] = mysqli_fetch_assoc($resultado);
        }
        mysqli_free_result($resultado);
        return $arrayResultado;
    }
}

?>