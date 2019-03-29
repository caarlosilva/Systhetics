<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
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
                                                <a class="btn btn-success form-control" role="button" data-toggle="modal" data-target="#modalCadastroUsuario">
                                                    <i><strong> Novo</strong></i>
                                                </a>
                                            </div>
                                            <div class="col mr-3">
                                                <input class="form-control" type="search" name="search" placeholder="Pesquisar">
                                            </div>                                           
                                        </div>
                                        
                                <table class="table table-hover table-striped" width="100%">
                                    <thead>
                                        <th></th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Telefone 1</th>
                                        <th>Telefone 2</th>
                                        <th>Admin</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(count($users) != 0){
                                        foreach($users as $user){?>
                                            <div class="col px-0 mb-4">
                                                <tr>
                                                    <td><img class="rounded-circle ml-2 pic" src="<?php echo $user['foto']; ?>" width='24' height='24'></td>
                                                    <td><?php echo $user['nome']; ?></td>
                                                    <td><?php echo $user['email']; ?></td>
                                                    <td><?php echo $user['tel1']; ?></td>
                                                    <td><?php echo $user['tel2']; ?></td>
                                                    <td><?php 
                                                    if ($user['admin'] == 1) {
                                                        echo '<span class="text-success">Sim</span>';
                                                    }else{
                                                        echo '<span class="text-danger">Não</span>';
                                                    }
                                                    ?>                                                  
                                                    </td>
                                                    <td class="text-right">
                                                    <a class="text-right" href="perfilUsuario.php?id=<?php echo $user['id']; ?>">
                                                        <img class="mr-2" src="img/view.png" alt="View" width="24px" height="24px">
                                                    </a>
                                                    <form action="php/atualizarUsuario.php" method="POST">
                                                        <a class="text-right" href="">
                                                            <input type="hidden" name="operacao" value="remover">
                                                            <input type="hidden" name="inputEmail" value="<?php echo $user['email']; ?>">
                                                            <input type="image" src="img/remove.png" width="24px" height="24px" alt="submit">
                                                        </a>
                                                    </form>        
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

        <form class="form row-form justify-content-center" action="php/cadastroUsuario.php" method="POST">
                  <div class="modal fade" id="modalCadastroUsuario" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header"><h3 class="text-success text-center modal-title">Cadastro de Usuário</h3></div>
                        <div class="modal-body">
                        
                        <div class="row">
                            <div class="col">
                              <label for="inputEmail">E-mail</label>
                              <input type="email" class="form-control inpt" id="inputEmail" name="inputEmail" placeholder="ex. jorge@ben.jor" required autofocus>
                            </div>
                          </div>

                        <div class="row">
                            <div class="col">
                              <label for="inputName">Nome Completo</label>
                              <input type="name" class="form-control inpt" id="inputName" name="inputName" placeholder="ex. Jorge Ben Jor" required>
                            </div>
                          </div>
                          
                            <div class="row">        
                              <div class="col">
                                <label for="inputTel1">Telefone 1</label>
                                <input type="tel" class="form-control inpt" id="inputTel1" name="inputTel1" placeholder="(00) 00000-0000" required>
                              </div>
                              <div class="col">
                                <label for="inputTel2">Telefone 2</label>
                                <input type="tel" class="form-control inpt" id="inputTel2" name="inputTel2" placeholder="(00) 00000-0000">
                              </div>
                            </div>  

                          <div class="row"> 
                            <div class="col">
                              <label for="inputPassword">Senha</label>
                              <input type="password" class="form-control inpt" id="inputPassword" name="inputPassword" placeholder="Senha" required>
                            </div>
                            <div class="col">
                              <label for="inputConfirmPassword">Confirme a Senha</label>
                              <input type="password" class="form-control inpt" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirme a Senha" required>
                            </div>
                            <input type="hidden" name="origem" value="usuario">
                          </div>                  
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger " data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                      </div>
                    </div>           
                  </div>
                </form>

    <div class="" tabindex="-1" role="dialog" aria-labelledby="modalMsg" aria-hidden="true" id="msgAlert" value="<?php 
        if(isset($_GET['msg']))           
            echo "msg";?>">            
            <?php 
            if(isset($_GET['msg'])){
                switch($_GET['msg']){
                    case "sucesso":
                        echo '<script type="text/javascript" language="javascript"> demo.showNotification(); </script>' ;
                        break;
               }
            }              
            ?>    
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
<script type="text/javascript" src="js/modalAlert.js"></script>
<script type="text/javascript" src="js/plugins/chartist.min.js"></script>
<script type="text/javascript" src="js/masks.js"></script> 
</html>