<?php
	require("conn.php");
/*
    $conexao = conectar();
    $limite = 20;
    $query = "SELECT * FROM Agenda;";
    $stmt = mysqli_prepare($conexao,$query);
    mysqli_stmt_bind_param($stmt,"i",$limite);
    $resultado = executar_SQL($conexao,$stmt);

    $calendar = array();
	while( $rows = mysqli_fetch_assoc($resultado) ) {
		// convert date to milliseconds
		$start = strtotime($rows['start_date']) * 1000;
		$end = strtotime($rows['end_date']) * 1000;
		$calendar[] = array(
		'id' =>$rows['id'],
		'title' => $rows['title'],
		'url' => "#",
		"class" => 'event-important',
		'start' => "$start",
		'end' => "$end");
	}
	$calendarData = array("success" => 1,"result"=>$calendar);
	echo json_encode($calendarData);

    desconectar($conexao);
*/
    class AgendaDAO{
        function insert($agenda){
            $conexao = conectar();
            date_default_timezone_set('America/Sao_Paulo');

            $horaInicio = explode (':', $agenda['start_date']);
            $dataInicio = $agenda['dia']." ".$agenda['start_date'];

            $horaFim = explode (':', $agenda['end_date']);
            $dataFim = $agenda['dia']." ".$agenda['end_date'];

            $query = "INSERT INTO Agenda (id_serv, id_cliente, id_usuario, title, description, start_date, end_date, created) VALUES (?,?,?,?,?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"iiisssss",$agenda['id_serv'], $agenda['id_cliente'], $agenda['id_usuario'], $agenda['title'], $agenda['description'], $dataInicio, $dataFim, $agenda['created']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar(){
            $conexao = conectar();
            $num = 1;
            $busca = "%" . $busca . "%";
            $query = "SELECT * FROM Agenda WHERE ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$busca);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }
    }

?>
