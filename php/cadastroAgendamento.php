<?php require "../DAO/agendaDAO.php";
    require "../DAO/servicoDAO.php";

    date_default_timezone_set('America/Sao_Paulo');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $sDAO = new ServicoDAO();
    $nomeServico = $sDAO->get($_POST['servico']);

    $agenda['id_serv']          = $_POST['servico'];
    $agenda['id_cliente']       = $_POST['cliente'];
    $agenda['id_usuario']       = $_SESSION['id'];
    $agenda['dia']              = $_POST['data'];
    $agenda['title']            = $nomeServico['nome'] .' - '.$_POST['horaInicio'].' ~ ' . $_POST['horaFim'];
    $agenda['description']      = "Serviço " .$nomeServico['nome']." marcado!";//$_POST['description'];
    $agenda['start_date']       = $_POST['horaInicio'];
    $agenda['end_date']         = $_POST['horaFim'];
    $agenda['created']          = date('Y-m-d H:i:s');

    //document.getElementById("demo").innerHTML = x;

    $agendaDAO = new AgendaDAO();

    $agendaDAO->insert($agenda);

    header("Location:../agenda.php?msg=sucesso");
?>