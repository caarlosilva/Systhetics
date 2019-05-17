<?php
	require("DAO/conn.php");
	$conexao = conectar();
	$querySQL = "SELECT * FROM agenda ORDER BY created DESC LIMIT 10;";
    $resultset = mysqli_query($conexao, $querySQL) or die("database error:". mysqli_error($conexao));
	$calendar = array();

	while( $rows = mysqli_fetch_assoc($resultset) ) {
		// convert date to milliseconds
	    $start = strtotime($rows['start_date']) * 1000;
	    $end = strtotime($rows['end_date']) * 1000;
	    $calendar[] = array(
		    'id' =>$rows['id'],
		    'title' => $rows['title'],
		    'url' => "#",
		    'class' => 'event-important',
		    'start' => "$start",
		    'end' => "$end");}
	$calendarData = array("success" => 1, "result"=>$calendar);
	echo json_encode($calendarData);
    desconectar($conexao);
    exit
?>
