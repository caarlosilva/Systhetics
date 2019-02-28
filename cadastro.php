<!doctype html>
  <html lang="pt-br">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Carlos Silva">
      <link rel="icon" href="../../../../favicon.ico">

      <title>Systhetics · Cadastro</title>

      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" type="text/CSS" rel="stylesheet">
      <link href="css/bootstrap.css" type="text/CSS" rel="stylesheet">
      <link href="css/cadastro.css" type="text/CSS" rel="stylesheet">
      <!-- Custom styles for this template -->
      <!-- <link href="form-validation.css" rel="stylesheet">  -->
    </head>
    <body>
      <div class="row rowMain">

        <div class=" my-5 mx-5 col-md-5">
             <img class="mb-4 banner" src="img/banner.png" alt="" width="auto" height="auto">
          </div>

      <div class="border-left border-dark my-5 p-5 col-md-4 formContent">
        <div class="my-3 text-center">
          <h2 class="ttle">Cadastro</h2>
        </div>

        <form class="form row-form center justify-content-center" action="php/cadastroUsuario.php" method="POST">
          <div class="row">
            <div class="col">
              <label for="inputName"><strong>Nome Completo</strong></label>
              <input type="name" class="form-control inpt" id="inputName" name="inputName" placeholder="ex. Jorge Ben Jor" required>
            </div>
          </div>
        
          <div class="row">
            <div class="col">
              <label for="inputEmail"><strong>E-mail</strong></label>
              <input type="email" class="form-control inpt" id="inputEmail" name="inputEmail" placeholder="ex. jorge@ben.jor" required autofocus>
            </div>
          </div>
            <div class="row">        
              <div class="col">
                <label for="inputTel1"><strong>Telefone Principal</strong></label>
                <input type="tel" class="form-control inpt" id="inputTel1" name="inputTel1" placeholder="(00) 00000-0000" required>
              </div>
              <div class="col">
                <label for="inputTel2"><strong>Telefone Secundário</strong></label>
                <input type="tel" class="form-control inpt" id="inputTel2" name="inputTel2" placeholder="(00) 00000-0000">
              </div>
            </div>  

          <div class="row"> 
            <div class="col">
              <label for="inputPassword"><strong>Senha</strong></label>
              <input type="password" class="form-control inpt" id="inputPassword" name="inputPassword" placeholder="Senha" required>
            </div>
            <div class="col">
              <label for="inputConfirmPassword"><strong>Confirme a Senha</strong></label>
              <input type="password" class="form-control inpt" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirme a Senha" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <input type="text" id="admin" name="admin" class="form-control sr-only" value=0>
              <button class="form-controls btn btn-lg btn-success btn-block inpt" type="submit"  id="btSubmit" name="btSubmit"> Cadastrar </button>
            </div>   
          </div>                 
          </form>   
        </div>
      </div>

        <footer class="footer mt-auto py-3 fixed-bottom text-center">
          <div class="container containerfooter">
            <span class="text-muted">&copy; DevOrion - 2019</span>
          </div>
        </footer>      
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.mask.1.14.11.min.js"></script>
        <script type="text/javascript" src="js/masks.js"></script>        
  </body>
</html>
