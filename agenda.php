<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Systhetics · Agenda</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/dashboard-style.css" rel="stylesheet" /> 
    <link href="css/style.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="css/calendar.css">
</head>

<body>
    <?php require_once "php/printMenu.php"?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php require_once "php/printNavbar.php"?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Agenda</h4>
                                </div>
                                <div class="card-body">
                                    <div class="page-header">
                                        
                                        <b><h3 class="text-center"></h3></b>
                                        <br>
                                    </div>
                                    
                                    <div class="row"> 
                                        <div class="pull-left form-inline ml-4">
                                            <div class="btn-group">
                                                <button class="btn btn-primary" data-calendar-nav="prev"><b><</b> </button>
                                                <button class="btn btn-primary" data-calendar-nav="today"><b>•</b></button>
                                                <button class="btn btn-primary" data-calendar-nav="next"> <b>></b></button>
                                            </div>
                                            <div class="btn-group ml-5">
                                                <button class="btn btn-warning active" data-calendar-view="month">Mês</button>
                                                <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                                            </div>
                                        </div></div>
                                        <hr>
                                    <div class="row">
                                        <div class="col-md-8 ml-3">

                                            <div id="showEventCalendar">                                   
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
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <h4 class="mt-0">Últimos Agendamentos Marcados</h4>
                                            <ul id="eventlist" class="nav nav-list"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php require_once "php/printFooter.php"?>
        </div>
    </div>



<!--   Core JS Files   -->
<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script> 
<script type="text/javascript" src="js/popper-1.14-7.min.js"></script>
<script type="text/javascript" src="js/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="js/light-bootstrap-dashboard.js"></script>

<script type="text/javascript" src="js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-notify.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/jquery.mask.1.14.11.min.js"></script>
<script type="text/javascript" src="js/masks.js"></script> 
<script type="text/javascript" src="js/consultaCEP.js"></script>

<script type="text/javascript" src="js/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
</body>

</html>