
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

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" type="text/CSS" rel="stylesheet">
    <link href="css/bootstrap.css" type="text/CSS" rel="stylesheet">
    <link href="css/signin.css" type="text/CSS" rel="stylesheet">
  </head>
  <body class="text-center">

    <form class="form-signin" method="POST" action="php/login.php">
      <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Systhetics</h1>
      
      <label for="inputEmail" class="sr-only">E-mail</label>
      <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="E-Mail" required autofocus>

      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">
        <!--
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label> 
      -->
      </div>
      <button class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
      <p> Não tem uma conta? <a href="cadastro.php">Cadastrar-se</a></p>
    </form>

    <div class="modal fade myAlert" tabindex="-1" role="dialog" aria-labelledby="modalMsg" aria-hidden="true" id="modal<?php 
            if(isset($_GET['msg'])){
                if($_GET['msg'] == "errosenha" || $_GET['msg'] == "useradmin" || $_GET['msg'] == "usernormal" || $_GET['msg'] == "errologin" || $_GET['msg'] == "negadouser" || $_GET['msg'] == "negadoadmin" || $_GET['msg'] == "erroImagem" || $_GET['msg'] == "sucessoImagem"){
                    echo "Msg";?>" >
            <div class="modal-dialog myAlert" role="document">
                <div class="modal-content myAlert">                 
                    <div class="modal-body myAlert">
                        <?php 
                            switch($_GET['msg']){
                                case "errosenha":{ ?>
                                    <p><span class="font-weight-bold myAlert">ERRO</span><br> Verifique se a senha digitada é igual nos 2 campos!</p>
                                <?php break;
                                }
                                case "useradmin":{ ?>
                                    <p>Olá, <?php echo isset($_SESSION['nome']) ?> ! <br> Você está logado como Administrador!</p>
                                <?php break;
                                }
                                case "usernormal":{ ?>
                                    <p>Olá, <?php echo isset($_SESSION['nome']) ?> ! <br> Você está logado como Usuário Comum!</p>
                                <?php break;
                                }
                                case "negadouser":{ ?>
                                    <p><span class="font-weight-bold">Erro:</span> você precisa estar logado para acessar esse conteúdo!</p>
                                <?php break;
                                }
                                case "negadoadmin":{ ?>
                                    <p><span class="font-weight-bold">Erro:</span> você não tem permissão para acessar esse conteúdo!</p>
                                <?php break;
                                }
                                case "errologin":{ ?>
                                    <p><span class="font-weight-bold myAlert">ERRO</span><br> Verifique se o e-mail e senha digitados</p>
                                <?php break;
                                }
                                case "erroImagem":{ ?>
                                    <p><span class="font-weight-bold">Erro:</span> o formato da imagem enviada não é suportado!</p>
                                <?php break;
                                }
                                case "sucessoImagem":{ ?>
                                    <p>Imagem alterada com sucesso!</p>
                                <?php break;
                                }
                            }
                        ?>
                    </div>
                      <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
                </div>
            </div>
            <?php }
            } ?>
        </div>

    <footer class="footer mt-auto fixed-bottom text-center ft-color">
        <div class="container">
            <span class="text-muted text-success">&copy; DevOrion - 2019</span>
        </div>
    </footer>     
    <!-- SCRIPTS -->
    <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper-1.14-7.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-4.3.1.min.js"></script>
    <script type="text/javascript" src="js/modalAlert.js"></script>
</body>
</html>
