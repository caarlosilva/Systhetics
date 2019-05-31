
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login">
    <meta name="author" content="Carlos Silva">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <!-- <meta name="generator" content="Jekyll v3.8.5">  -->
    <title>Systhetics · Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/dashboard-style.css" rel="stylesheet" /> 
    <link href="css/user.css" rel="stylesheet" type="text/css" >
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" type="text/CSS" rel="stylesheet">
    <link href="css/bootstrap.css" type="text/CSS" rel="stylesheet">
    <link href="css/signin.css" type="text/CSS" rel="stylesheet">

    <?php 

        if(isset($_GET['msg'])){
            switch($_GET['msg']){
                case "sucesso":
                    $mensagem = "Usuário adicionado com sucesso!" ;
                    $icon = 'nc-icon nc-single-02';
                    $colortype = 'primary'; 
                    break;
                case "errosenha":
                    $mensagem = "Acabou o pao de queijo brother!";
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'danger';
                    break;
                case "erroemail":
                    $mensagem = "O e-mail inserido já existe!" ;
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'danger'; 
                    break;
                case "usernormal":
                    $mensagem = "Ainda não existe suporte para usuário comum! Por favor, entre com um usuario Administrador." ;
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'danger'; 
                    break;
                case "errologin":
                    $mensagem = "Dados inválidos! Por favor, insira-os corretamente." ;
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'danger'; 
                    break;
                case "erropermissao":
                    $mensagem = "Você não tem permissão para acessar esse contéudo." ;
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'danger'; 
                    break;
                case "logout":
                    $mensagem = "Usuário desconectado!" ;
                    $icon = 'nc-icon nc-single-02';
                    $colortype = 'primary'; 
                    break;
                default:
                    break;
            }
        }              
    ?>    

  </head>

  <body class="text-center" onload=" <?php if(isset($_GET['msg'])) { echo "demo.showNotification('top','center', '$mensagem', '$icon', '$colortype');"; } ?> ">

    <form class="form-signin" method="POST" action="php/login.php">
      <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Systhetics</h1>
      
      <label for="inputEmail" class="sr-only">E-mail</label>
      <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="E-Mail" required autofocus>

      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Senha" required>
      <input type="hidden" name="origem" value="index">
      <div class="checkbox mb-3">

        <!--
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label> 
      -->
      </div>
      <button class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
      <p> Não tem uma conta? <a class="text-success linkcad" data-toggle="modal" data-target="#modalCadastroUsuario">Cadastre-se</a></p>
    </form>

    <form class="form row-form justify-content-center" action="php/cadastroUsuario.php" method="POST">
        <div class="modal fade" id="modalCadastroUsuario" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-body text-center modal-title">Cadastro de Usuário</h3>
                    </div>
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
                                <input type="hidden" name="origem" value="index">
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

    <footer class="my-2 fixed-bottom  text-center">
        <span class="text-white text-muted mt-2">&copy; DevOrion - 2019</span>
    </footer>     
    <!-- SCRIPTS --> 
</body>
<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="js/popper-1.14-7.min.js"></script>
<script type="text/javascript" src="js/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="js/light-bootstrap-dashboard.js"></script>

<script type="text/javascript" src="js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-notify.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/modalAlert.js"></script>
<script type="text/javascript" src="js/jquery.mask.1.14.11.min.js"></script>
<script type="text/javascript" src="js/masks.js"></script> 
</html>
