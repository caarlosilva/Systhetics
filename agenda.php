<!DOCTYPE html>
<html lang="pt-br">

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

    <?php 
    require "DAO/clienteDAO.php";
    require "DAO/servicoDAO.php";
        $cDAO = new ClienteDAO(); 
        $sDAO = new ServicoDAO();
        $busca = "";
        $clientes = $cDAO->listar($busca);  
        $servicos = $sDAO->listar($busca);

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($_GET['msg'])){
            switch($_GET['msg']){
                case "sucesso":
                    $mensagem = "Agendamento <strong>cadastrado</strong> com sucesso!" ;
                    $icon = 'nc-icon nc-single-02';
                    $colortype = 'primary'; 
                    break;
                case "errosenha":
                    $mensagem = "As senhas informadas diferem entre si. Por favor, tente novamente!";
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'danger';
                    break;
                case "erroemail":
                    $mensagem = "O e-mail inserido já existe!" ;
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'danger'; 
                    break;
                case "clienteremovido":
                    $mensagem = "Cliente <strong>removido</strong> com sucesso!" ;
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'warning'; 
                    break;
                default:
                    break;
            }
        }                            
    ?>

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
                                <div class="card-body">
                                    <div class="page-header">
                                        
                                        <b><h2 class="text-center"></h2></b>
                                        <br>
                                    </div>
                                    <div class="container-fluid">
                                    <div class="row"> 
                                        <div class="col pull-left form-inline ml-4">
                                            <div class="btn-group">
                                                <button class="btn btn-primary" data-calendar-nav="prev"><b><</b> </button>
                                                <button class="btn btn-primary" data-calendar-nav="today"><b>•</b></button>
                                                <button class="btn btn-primary" data-calendar-nav="next"> <b>></b></button>
                                            </div>
                                            <div class="btn-group ml-5">
                                                <button class="btn btn-warning active" data-calendar-view="month">Mês</button>
                                                <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-end ml-5">
                                            <button class="btn btn-dark" data-toggle="modal" data-target="#modalCadastroAgendamento"><b>Novo Agendamento</b></button>
                                        </div>
                                    </div>
                                    </div>                                   
                                        <hr>
                                    <div class="row">
                                        <div class="col-md-8 ml-3">
                                            <div id="showEventCalendar">  
                                                                            
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


            <form id="formAgendamento" name="formAgendamento" class="form row-form justify-content-center" action="php/cadastroAgendamento.php" method="POST">
                <div class="modal fade" id="modalCadastroAgendamento" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content" style="width: 800px !important;">
                        <h3 class="text-dark text-center" id="teste">Novo Agendamento</h3>
                        <div class="modal-body">
                        
                        <div class="row">
                            <div class="form-group col-md">
                                <label for="servico">Serviço</label>
                                <select id="servico" name="servico" class="form-control" required>
                                <?php 
                                    foreach($servicos as $servico){
                                        echo "<option value=".$servico['id'].">".$servico['nome']. " - ".$servico['tipo']."</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group col-md">
                                <label for="cliente">Cliente</label>
                                <select id="cliente" name="cliente" class="form-control" required>
                                    <?php 
                                        foreach($clientes as $cliente){
                                            echo "<option value=".$cliente['id'].">".$cliente['nome']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>       
                        </div>

                        <div class="row">
                            <div class="form-group col-md">
                                <label for="dia">Dia</label>                
                                  <input type="date" class="form-control" min="<?php date_default_timezone_set('America/Sao_Paulo'); echo date('Y-m-d');?>" value="<?php date_default_timezone_set('America/Sao_Paulo'); echo date('Y-m-d');?>" name="data" id="data" placeholder="">                             
                            </div>
                            <div class="form-group col-md">
                              <label for="horaInicio">Horário de Início</label>
                              <input type="time" class="form-control" name="horaInicio" id="horaInicio" step="900" max="21:30" value="<?php echo date('H:00'); ?>" placeholder="">
                            </div>
                            <div class="form-group col-md">
                              <label for="secoes">Secões</label>
                              <input type="number" class="form-control" name="secoes" id="secoes" value="1" min="1" placeholder="1 seção = 30 minutos">                             
                            </div>
                            <div class="form-group col-md">
                              <label for="horaFim">Horário de Término</label>
                              <input type="time" class="form-control" name="horaFim" readonly="true" id="horaFim" step="900" value="" placeholder="">
                            </div>
                        </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger mx-2 " data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-success mx-2">Agendar</button>
                        </div>
                    </div>
                 </div>           
                </div>
            </form>

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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>

<script type="text/javascript">
    $("#secoes, #horaInicio").change(function(){
        var horario = (document.getElementById("horaInicio").value).split(":");
        var hora = horario[0];
        var minuto = horario[1];
        var dataAmor = new Date();
        secoes = document.getElementById("secoes").value;
        var minutosSecoes = Number(secoes);
        minutosSecoes = (minutosSecoes * 30) + parseInt(minuto);
        dataAmor.setHours(hora);
        dataAmor.setMinutes(minutosSecoes);
        if(dataAmor.getHours() < 10){
            hora = '0' + (dataAmor.getHours());
        }else{
            hora = dataAmor.getHours();
        }
        if(dataAmor.getMinutes() < 10){
            minuto = '0' + (dataAmor.getMinutes());
        }else{
            minuto = dataAmor.getMinutes();
        }
        document.getElementById('horaFim').value = hora + ':' + minuto;
        $("#horaFim").css("background-color", "#e1e5ed");
    });
</script>

</body>

</html>