<?php
	require("conn.php");

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
?>
