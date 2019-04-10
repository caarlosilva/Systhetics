<!doctype html>
  <html lang="pt-br">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Carlos Silva">
      <link rel="icon" type="image/png" href="img/favicon.png">

      <title>Systhetics · Cadastro</title>

      <!-- CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/dashboard-style.css" rel="stylesheet" /> 
    <link href="css/cadastro.css" type="text/CSS" rel="stylesheet">
    </head>
    <body>
      <div class="row rowMain">
      <div class="col-1">
          <ul class="nav">
            <li>
              <a class="nav-link" href="index.php">
                <!-- <i class="nc-icon nc-stre-left"></i> -->
                <button class="form-controls btn btn-lg btn-success nc-icon nc-stre-left"> </button>
              </a>
          </li>
        </ul>
      </div>


        <div class=" my-5 mx-5 col-md-5">
          <img class="mb-4 banner" src="img/banner.png" alt="" width="auto" height="auto">
        </div>

      <div class="border-left border-dark mr-0 col-md-5 formContent">
        <div class="my-3 text-center">
          <h2 class="text-success ttle">Cadastro</h2>
        </div>

        <form class="form row-form center justify-content-center" action="php/cadastroUsuario.php" method="POST">
          <div class="row">
            <div class="col">
              <label for="inputName">Nome Completo</label>
              <input type="name" class="form-control inpt" id="inputName" name="inputName" placeholder="ex. Jorge Ben Jor" required>
            </div>
          </div>
        
          <div class="row">
            <div class="col">
              <label for="inputEmail">E-mail</label>
              <input type="email" class="form-control inpt" id="inputEmail" name="inputEmail" placeholder="ex. jorge@ben.jor" required autofocus>
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
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <input type="text" id="admin" name="admin" class="form-control sr-only" value=0>
              <button class="form-controls btn btn-lg btn-success inpt" type="submit"  id="btSubmit" name="btSubmit"> Cadastrar </button>
            </div>   
          </div>                 
          </form> 
        </div>
      </div>

      <footer class="footer mt-auto ft-color fixed-bottom">
        <div class="container">
        <nav>
            <ul class="footer-menu">
                <li>
                    <a href="#">
                        <span class="text-success text-center">Siga nossas redes sociais </span>
                    </a>                      
                </li>
                <li>
                    <a target="_blank" href="http://www.twitter.com">
                        <img src="img/twitter.png" width="16" height="16">
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://www.facebook.com">
                        <img src="img/facebook.png" width="16" height="16">
                    </a>
                </li>
            </ul>
          <p class="copyright text-center">                        
            <span class="text-muted text-success">&copy; DevOrion - 
                <script>
                    document.write(new Date().getFullYear())
                </script>
             </span>
        </p>
        </nav>
      </div>
    </footer>
      
      <!--
        <footer class="footer mt-auto fixed-bottom text-center ft-color">
          <div class="container px-1">
            <span class="text-muted text-success">&copy; DevOrion - 2019</span>
          </div>
        </footer>      
        -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
  <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
  <script type="text/javascript" src="js/popper-1.14-7.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-4.3.1.min.js"></script>
  <script type="text/javascript" src="js/light-bootstrap-dashboard.js"></script>

  <script type="text/javascript" src="js/plugins/bootstrap-switch.js"></script>
  <script type="text/javascript" src="js/plugins/bootstrap-notify.js"></script>
  <script type="text/javascript" src="js/demo.js"></script>
  <script type="text/javascript" src="js/jquery.mask.1.14.11.min.js"></script>
  <script type="text/javascript" src="js/masks.js"></script>        
  </body>
</html>
