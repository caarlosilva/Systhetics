<?php
	require("DAO/conn.php");
	$conexao = conectar();
	$query = "SELECT * FROM Agenda;";
    $resultset = mysqli_query($conexao, $query) or die("database error:". mysqli_error($conexao));
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
