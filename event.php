<?php
	include_once("DAO/conn.php");
	$conexao = conectar();
	$limite = 1;
	$query = "SELECT * FROM Agenda WHERE ?";
	$stmt = mysqli_prepare($conexao,$query);
	mysqli_stmt_bind_param($stmt,"i",$limite);
	$resultset = executar_SQL($conexao,$stmt);
	$calendar = array();

	while( $rows = mysqli_fetch_assoc($resultset) ) {
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
	$calendarData = array(
	"success" => 1,
	"result"=>$calendar);
	echo json_encode($calendarData);
    desconectar($conexao);
?>