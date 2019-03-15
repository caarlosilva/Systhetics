<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Systhetics · Usuários</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/dashboard-style.css" rel="stylesheet" /> 
    <link href="css/user.css" rel="stylesheet" type="text/css" >

    <!--     -->   
    <?php require "DAO/userDAO.php";
        //require "php/DAO/CategoriaDAO.php";
        $uDAO = new UserDAO(); 
        $busca = "";
        $users = $uDAO->listar($busca);                
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
                        <div class="col-md-12">        
                                <div class="card striped-tabled-with-hover">
                                    <div class="card-header ">
                                        <h3 class="card-title">Usuários</h3>
                                        <p class="card-category">Usuários cadastrados no sistema</p>
                                    </div>
                                    <div class="card-body table-full-width">
                                        <div class="row ">
                                            <div class="col-2 ml-3" >
                                                <a class="btn btn-success form-control" role="button" href="cadastro.php">
                                                    <i><strong> Novo</strong></i>
                                                </a>
                                            </div>
                                            <div class="col mr-3">
                                                <input class="form-control" type="search" name="search" placeholder="Pesquisar">
                                            </div>                                           
                                        </div>
                                        
                                <table class="table table-hover table-striped" width="100%">
                                    <thead>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Telefone 1</th>
                                        <th>Telefone 2</th>
                                        <th>Admin</th>
                                        <th>Opcões</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(count($users) != 0){
                                        foreach($users as $user){?>
                                            <div class="col px-0 mb-4">
                                                <tr>
                                                    <td><?php echo $user['nome']; ?></td>
                                                    <td><?php echo $user['email']; ?></td>
                                                    <td><?php echo $user['tel1']; ?></td>
                                                    <td><?php echo $user['tel2']; ?></td>
                                                    <td><?php 
                                                    if ($user['admin'] == 1) {
                                                        echo "Sim";
                                                    }else{
                                                        echo "Não";
                                                    }
                                                    ?>                                                  
                                                    </td>
                                                    <td class="text-right">
                                                    <a href="">
                                                        <img class="mr-2" src="img/view.png" alt="View" width="24px" height="24px">
                                                    </a>
                                                    <a href="">
                                                        <img class="mr-2" src="img/remove.png" alt="Remove" width="24px" height="24px">
                                                    </a>
                                                    <a href="">
                                                        <img class="" src="img/edit.png" alt="Edit" width="24px" height="24px">
                                                    </a>
                                                    </td>
                                                </tr>
                                            </div>
                                        <?php }
                                    }else{ ?>
                                        <div class="col px-0">
                                            <div class="jumbotron jumbotron-fluid">
                                                <div class="container text-center">
                                                    <h1>Nada encontrado! 😢</h1>
                                                    <p>Nenhum usuário cadastrado no sistema.</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                ?>
                                </tbody>
                            </table>  
                            </div>
                            </div>      
                    </div>    
                </div>
            </div>
            
        </div>
        <?php require_once "php/printFooter.php"?>
    </div>
</body>
<!--   Core JS Files   -->
<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="js/popper-1.14-7.min.js"></script>
<script type="text/javascript" src="js/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="js/light-bootstrap-dashboard.js"></script>

<script type="text/javascript" src="js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-notify.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/plugins/chartist.min.js"></script>

</html>