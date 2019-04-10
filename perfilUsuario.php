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
        require "DAO/userDAO.php";

        if(isset($_GET['id'])){
            $userDAO = new UserDAO();
            $usuario = $userDAO->getById($_GET['id']);
        }else{
            header('Location: index.php');
        }
    ?>
    <title>Systhetics · Perfil de <?php $firstname = explode(" ", $usuario['nome']); echo  $firstname[0];?></title>
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
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Perfil de Usuário</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="php/atualizarUsuario.php">
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label for="inputEmail">E-mail</label>
                                                    <input type="email" class="form-control inpt is-valid"  readonly id="inputEmail" name="inputEmail" placeholder="ex. jorge@ben.jor" value="<?php echo $usuario['email'] ;?>" autofocus>
                                                    <div class="valid-feedback">
                                                        Não é possível alterar o e-mail
                                                      </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 pl-1">
                                                <div class="form-group">
                                                    <label for="inputName">Nome Completo</label>
                                                    <input type="name" class="form-control inpt" id="inputName" value="<?php echo $usuario['nome'] ;?>" name="inputName" placeholder="ex. Jorge Ben Jor" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label for="inputTel1">Telefone 1</label>
                                                    <input type="tel" class="form-control inpt" id="inputTel1" value="<?php echo $usuario['tel1'] ;?>" name="inputTel1" placeholder="(00) 00000-0000" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label for="inputTel2">Telefone 2</label>
                                                    <input type="tel" class="form-control inpt" id="inputTel2" value="<?php echo $usuario['tel2'] ;?>" name="inputTel2" placeholder="(00) 00000-0000">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label for="inputTipo">Tipo de Usuário</label>
                                                    <select class="custom-select" name="inputTipo" id="inputTipo">
                                                      <option <?php if($usuario['admin'] == 0){echo 'selected=""'; }?> value="0">Comum</option>
                                                      <option <?php if($usuario['admin'] == 1){echo 'selected=""'; }?> value="1">Administrador</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Alterar Senha</h4>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label for="inputCurrentPassword">Senha Atual</label>
                                                    <input type="password" class="form-control inpt" id="inputCurrentPassword" name="inputCurrentPassword" placeholder="Senha">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col pr-1">
                                                <div class="form-group">
                                                    <label for="inputPassword">Nova Senha</label>
                                                    <input type="password" class="form-control inpt" id="inputPassword" name="inputPassword" placeholder="Nova Senha">
                                                </div>
                                            </div>
                                            <div class="col pl-1">
                                                <div class="form-group">
                                                    <label for="inputConfirmPassword">Confirme a Senha</label>
                                                    <input type="password" class="form-control inpt" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirme a Senha">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="operacao" value="atualizar">
                                        <button type="submit" class="btn btn-primary btn-fill pull-right">Atualizar</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <form id="formImagem" name="formImagem" action="php/atualizarImagem.php" method="POST" enctype="multipart/form-data">
                                            <label for="imagem">                           
                                                <p class="mt-1">
                                                    <img class="avatar pic border-gray imgperfil" src="<?php echo $usuario['foto'] ;?>" alt="profile">
                                                </p>
                                                
                                            </label>
                                            <input id="imagem" name="imagem" type="file" accept="image/*">
                                            <input type="hidden" name="email" id="email" value="<?php echo $usuario['email'] ;?>">
                                            <input type="hidden" name="id" id="id" value = "<?php echo $usuario['id'] ;?>">
                                        </form>
                                        <h5 class="text-success text-center"><strong><h3><?php echo $usuario['nome'] ;?></h3></strong></h5>

                                        

                                        <p class="description">
                                            <h4><?php echo $usuario['email'] ;?></h4>
                                        </p>
                                    </div>
                                             
                                    <p class="description text-center">
                                        <strong><h4 class="text-center">
                                        <?php echo $usuario['tel1'] ;?> <br>
                                        <?php echo $usuario['tel2'] ;?> <br>
                                        <br>
                                        <span class="text-info"> <?php if($usuario['admin'] == 0){echo 'Usuário Comum'; } else { echo 'Administrador';} ?> </span>                                      
                                        </strong> </h4>   
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
<script type="text/javascript" src="js/masks.js"></script> 
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