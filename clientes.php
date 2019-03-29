<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Systhetics · Clientes</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/dashboard-style.css" rel="stylesheet" /> 

    <!--     -->   
    <?php require "DAO/clienteDAO.php";
        //require "php/DAO/CategoriaDAO.php";
        $cDAO = new ClienteDAO(); 
        $busca = "";
        $clientes = $cDAO->listar($busca);                
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
                                    <h3 class="card-title">Clientes</h3>
                                    <p class="card-category">Clientes cadastrados no sistema</p>
                                </div>
                                <div class="card-body table-full-width">
                                    <div class="row mb-4">
                                        <div class="col-2 ml-3" >
                                            <a class="btn btn-success form-control" id="btCad" role="button" data-toggle="modal" data-target="#modalCadastroCliente">
                                                <i><strong> Novo</strong></i>
                                            </a>
                                        </div>
                                        <div class="col mr-3">
                                            <input class="form-control" type="search" name="search" placeholder="Pesquisar">
                                        </div>                                           
                                    </div>

                                    <table class="table table-hover table-striped" width="100%">
                                        <thead>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Telefone 1</th>
                                            <th>Rua</th>
                                            <th>Cidade</th>
                                            <th>Estado</th>
                                            <th>Opções</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(count($clientes) != 0){
                                                    foreach($clientes as $cliente){?>
                                                        <div class="col px-0 mb-4">
                                                            <tr>
                                                                <td><?php echo $cliente['id']; ?></td>
                                                                <td><?php echo $cliente['nome']; ?></td>
                                                                <td><?php echo $cliente['tel1']; ?></td>
                                                                <td><?php echo $cliente['rua'] . ", " . $cliente['num'];?></td>
                                                                <td><?php echo $cliente['cidade']; ?></td>
                                                                <td><?php echo $cliente['estado']; ?></td>
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

                <form class="form row-form justify-content-center" action="php/cadastroCliente.php" method="POST">
                  <div class="modal fade" id="modalCadastroCliente" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header"><h3 class="text-success text-center modal-title">Cadastro de Cliente</h3></div>
                        <div class="modal-body">
                            
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0 mt-2" for="nome">Nome</label>
                                        <input type="name" class="form-control" id="nome" placeholder="Jorge Ben Jorge" name="nome" required>
                                    </div>
                                </div>      
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0 mt-2" for="tel1">Telefone 1</label>
                                        <input type="tel" class="form-control" id="tel1" placeholder="(00) 00000-0000" name="tel1" required>
                                    </div>
                                    <div class="col">
                                        <label class="mb-0 mt-2" for="tel2">Telefone 2</label>
                                        <input type="tel" class="form-control" id="tel2" placeholder="(00) 00000-0000" name="tel2">
                                    </div>                                                 
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="mb-0 mt-2" for="cep">CEP</label>
                                        <input type="cep" class="form-control" id="cep" placeholder="00000000" name="cep">
                                    </div>
                                    <div class="col">
                                        <label class="mb-0 mt-2" for="rua">Rua</label>
                                        <input type="address" class="form-control" id="rua" placeholder="Rua dos Bobos" name="rua">
                                    </div>
                                    <div class="col-3">
                                        <label class="mb-0 mt-2" for="num">N°</label>
                                        <input type="num" class="form-control" id="num" placeholder="1278" name="num">
                                    </div>                           
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0 mt-2" for="complemento">Complemento</label>
                                        <input type="text" class="form-control" id="complemento" placeholder="Bloco B" name="complemento">
                                    </div>
                                    <div class="col">
                                        <label class="mb-0 mt-2" for="bairro">Bairro</label>
                                        <input type="text" class="form-control" id="bairro" placeholder="Jardim Cruzeiro do Sul" name="bairro">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0 mt-2" for="cidade">Cidade</label>
                                        <input type="city" class="form-control" id="cidade" placeholder="São Carlos" name="cidade">
                                    </div>
                                    <div class="col-2">
                                        <label class="mb-0 mt-2" for="estado">Estado</label>
                                        <input type="estate" class="form-control" id="estado" placeholder="SP" name="estado">
                                    </div>
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
                
            <?php require_once "php/printFooter.php"?>
        </div>
</body>
<!--   Core JS Files   -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<!-- <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script> -->
<script type="text/javascript" src="js/popper-1.14-7.min.js"></script>
<script type="text/javascript" src="js/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="js/light-bootstrap-dashboard.js"></script>

<script type="text/javascript" src="js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-notify.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/consultaCEP.js"></script>


</html>