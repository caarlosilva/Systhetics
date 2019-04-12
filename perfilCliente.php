<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="css/user.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/dashboard-style.css" rel="stylesheet" /> 


    <?php 
        require "DAO/conn.php";
        require "DAO/clienteDAO.php";

        if(isset($_GET['id'])){
            $clienteDAO = new ClienteDAO();
            $cliente = $clienteDAO->get($_GET['id']);
        }else{
            header('Location: clientes.php');
        }
    ?>
    <title>Systhetics · Perfil de <?php $firstname = explode(" ", $cliente['nome']); echo  $firstname[0];?></title>
    <script type="text/javascript" src="js/uploadImagem.js"></script> 
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
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Perfil de Cliente</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="php/atualizarCliente.php">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputName">Nome Completo</label>
                                                    <input type="name" class="form-control inpt" id="nome" value="<?php echo $cliente['nome'] ;?>" name="nome" placeholder="ex. Jorge Ben Jor" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col py-0">
                                                <div class="form-group">
                                                    <label for="inputTel1">Telefone 1</label>
                                                    <input type="tel" class="form-control inpt" id="tel1" value="<?php echo $cliente['tel1'] ;?>" name="tel1" placeholder="(00) 00000-0000" required>
                                                </div>
                                            </div>
                                            <div class="col py-0">
                                                <div class="form-group">
                                                    <label for="inputTel2">Telefone 2</label>
                                                    <input type="tel" class="form-control inpt" id="tel2" value="<?php echo $cliente['tel2'] ;?>" name="tel2" placeholder="(00) 00000-0000">
                                                </div>
                                            </div>
                                            <div class="col-3 py-0">
                                                <div class="form-group">
                                                    <label for="cep">CEP</label>
                                                    <input type="cep" class="form-control inpt" id="cep" name="cep" value="<?php echo $cliente['cep'] ;?>" placeholder="00000-000" required>
                                                </div>          
                                            </div> 
                                        </div> 

                                        <div class="row">           
                                            <div class="col py-0">
                                                <label class="mb-0 mt-2" for="rua">Rua</label>
                                                <input type="address" class="form-control" id="rua" value="<?php echo $cliente['rua'] ;?>" placeholder="Rua dos Bobos" name="rua">
                                            </div>
                                            <div class="col-2 py-0">
                                                <label class="mb-0 mt-2" for="num">N°</label>
                                                <input type="num" class="form-control" id="num" value="<?php echo $cliente['num'] ;?>" placeholder="1278" name="num" required>
                                            </div>  
                                        </div>

                                        <div class="row">
                                            <div class="col py-0">
                                                <label class="mb-0 mt-2" for="complemento">Complemento</label>
                                                <input type="text" class="form-control" id="complemento" value="<?php echo $cliente['complemento'] ;?>" placeholder="Bloco B" name="complemento">
                                            </div>
                                            <div class="col py-0">
                                                <label class="mb-0 mt-2" for="bairro">Bairro</label>
                                                <input type="text" class="form-control" id="bairro" value="<?php echo $cliente['bairro'] ;?>" placeholder="Jardim Cruzeiro do Sul" name="bairro">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col py-0">
                                                <label class="mb-0 mt-2" for="cidade">Cidade</label>
                                                <input type="city" class="form-control" id="cidade" value="<?php echo $cliente['cidade'] ;?>" placeholder="São Carlos" name="cidade">
                                            </div>
                                            <div class="col-2 py-0">
                                                <label class="mb-0 mt-2" for="estado">Estado</label>
                                                <input type="estate" class="form-control" id="estado" value="<?php echo $cliente['estado'] ;?>" placeholder="SP" name="estado">
                                            </div>
                                        </div>
                                        <hr>
                                        <input type="hidden" name="id" id="id" value="<?php echo $cliente['id'];?>">
                                        <input type="hidden" name="operacao" value="atualizar">
                                        <button type="submit" class="btn btn-primary btn-fill pull-right">Atualizar</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <form id="formImagem" name="formImagem" action="php/atualizarImagemCliente.php" method="POST" enctype="multipart/form-data">
                                            <label for="imagem">                           
                                                <p class="mt-1">
                                                    <img class="avatar pic border-gray imgperfil" src="<?php echo $cliente['foto'] ;?>" alt="profile">
                                                </p>
                                                
                                            </label>
                                            <input id="imagem" name="imagem" type="file" accept="image/*">
                                            <input type="hidden" name="id" id="id" value = "<?php echo $cliente['id'] ;?>">
                                        </form>
                                        <h5 class="text-success text-center"><strong><h3><?php echo $cliente['nome'] ;?></h3></strong></h5>
                                    </div>
                                             
                                    <p class="description text-center">
                                        <h4 class="text-center">
                                        <?php echo $cliente['tel1'] ;?> - <?php echo $cliente['tel2'] ;?> <br>                                  
                                        </h4>   
                                        <hr>
                                        <h4 class="text-center">
                                            <?php echo $cliente['cep'] ;?> -  <?php echo $cliente['rua'] ;?>,  <?php echo $cliente['num'] ;?> <br>
                                            <?php if($cliente['complemento'] != ""){ echo $cliente['complemento'] . " - " ;} ;?>  <?php echo $cliente['bairro'] ;?><br>
                                            <?php echo $cliente['cidade'] ;?> -  <?php echo $cliente['estado'] ;?>
                                        </h4>
                                    </p>
                                </div>
                                <hr>
                                <div class="button-container mr-auto ml-auto">
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-twitter"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-google-plus-square"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once "php/printFooter.php"?>
        </div>
    </div>
<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="js/popper-1.14-7.min.js"></script>
<script type="text/javascript" src="js/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="js/light-bootstrap-dashboard.js"></script>

<script type="text/javascript" src="js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-notify.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/modalAlert.js"></script>
<script type="text/javascript" src="js/plugins/chartist.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.1.14.11.min.js"></script>
<script type="text/javascript" src="js/masks.js"></script> 
<script type="text/javascript" src="js/consultaCEP.js"></script>
<script type="text/javascript">   
    $(document).ready(function () {
        $('#formImagem').on('change', "input#imagem", function (e) {
            e.preventDefault();
            $("#formImagem").submit();
        });
    });
</script>
</body>
<!--   Core JS Files   -->

</html>