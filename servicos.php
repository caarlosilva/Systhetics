<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Systhetics · Serviços</title>
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

    <?php require "DAO/servicoDAO.php";

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(!isset($_SESSION) || $_SESSION['admin'] != 1){
            header('Location:index.php?msg=erropermissao');
        }

        $servicoDAO = new ServicoDAO(); 
        $busca = ""; 
        $servicos = $servicoDAO->listar($busca);
        if(isset($_GET['id'])){
            $servView = $servicoDAO->get($_GET['id']);
            if(!isset($servView)){
                header('location:servicos.php');
            }
        }
        else{
            $servView['id']=0;
            $servView['nome']='Nome do Serviço';
            $servView['descricao']='Essa é a descrição do serviço. Para editar um serviço, clique em seus respectivos campos.';
            $servView['foto']='img/servico/default.png';
            $servView['preco']=1.99;
            $servView['tipo']='Corporal';
        }

        if(isset($_GET['msg'])){
            switch($_GET['msg']){
                case "sucesso":
                    $mensagem = "Serviço <strong>cadastrado</strong> com sucesso!" ;
                    $icon = 'nc-icon nc-check-2';
                    $colortype = 'primary'; 
                    break;
                case "servicoremovido":
                    $mensagem = "Serviço <strong>removido</strong> com sucesso!";
                    $icon = 'nc-icon nc-check-2';
                    $colortype = 'warning';
                    break;
                default:
                    break;
            }
        }
    ?>

</head>

<body onload=" <?php if(isset($_GET['msg'])) { echo "demo.showNotification('top','center', '$mensagem', '$icon', '$colortype');"; } ?> ">
    <?php require_once "php/printMenu.php"?>
    <div class="main-panel">
        <!-- Navbar -->
        <?php require_once "php/printNavbar.php"?>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Serviços</h4>
                                    <p class="card-category">Serviços disponíveis para agendamentos</p>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-2 ml-3" >
                                            <a class="btn btn-success form-control" role="button" data-toggle="modal" data-target="#modalCadastroServico">
                                                <i><strong> Novo</strong></i>
                                            </a>
                                        </div>
                                        <div class="col mr-3">
                                            <input class="form-control" type="search" name="search" placeholder="Pesquisar">
                                        </div>                                           
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <?php
                                        if(count($servicos) != 0){
                                            foreach($servicos as $servico){
                                                ?>

                                                <a href="servicos.php?id=<?php echo $servico['id'];?>" class="list-group-item text-center d-flex justify-content-between align-items-center list-group-item-action <?php if($servico['id'] == $servView['id']){ echo "active";}?>">
                                                    <img class="pic"src="<?php echo $servico['foto']; ?>" width="64" height="64">                                  
                                                    <p class="text-center">
                                                        <?php echo $servico['nome']; ?><br>                                                  
                                                        <span> R$/30 min: <?php echo $servico['preco']; ?></span>
                                                    </p>
                                                    <span class="badge <?php if ($servico['tipo'] == "Facial") { echo 'badge-danger';}elseif($servico['tipo'] == "Corporal"){echo 'badge-warning';}else{ echo 'badge-success';}?> badge-pill"><?php echo $servico['tipo'];?></span>
                                                </a>

                                            <?php
                                            }
                                        }
                                        else{ 
                                            ?>
                                            <div class="col px-0">
                                                <div class="jumbotron jumbotron-fluid">
                                                    <div class="container text-center">
                                                        <h1>Nada encontrado! 😢</h1>
                                                        <p>Não existem serviços cadastrados no sistema.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- -->

                        <div class="col-md-5">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img class="img-cover" src="img/banner.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <form id="formImagem" name="formImagem" action="php/atualizarImagemServico.php" method="POST" enctype="multipart/form-data">
                                            <label for="imagem">                           
                                                <p class="mt-1">
                                                    <img class="avatar pic border-gray imgperfil" src="<?php echo $servView['foto'] ;?>" alt="profile">
                                                </p>    
                                            </label>
                                            <input id="imagem" name="imagem" type="file" accept="image/*">
                                            <input type="hidden" name="email" id="email" value="<?php echo $servView['nome'] ;?>">
                                            <input type="hidden" name="id" id="id" value = "<?php echo $servView['id'] ;?>">
                                        </form>

                                        <form id="formAtualizaServico" name="formAtualizaServico" action="php/atualizarServico.php" method="POST">
                                            <div class="row">
                                                <div class="col mx-2 ">
                                                  <label for="nome"></label>
                                                  <input type="servicename" class="text-success form-control inpt borderless" id="nome" name="nome" value="<?php echo $servView['nome'] ;?>" required>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col mx-2 text- mt-3">
                                                    <label for="descricao">Descrição</label>
                                                    <textarea class="form-control desc my-3" rows="5" name="descricao" id="descricao"><?php echo $servView['descricao'];?> </textarea>
                                                </div>       
                                              </div>

                                                <div class="row">
                                                  <div class="col mx-2">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">R$/30 min</span>
                                                            </div>
                                                            <input name="preco" id="preco" type="price" class="form-control" placeholder="2019,99" value="<?php echo $servView['preco'] ;?>">
                                                        </div>
                                                  </div>

                                                  <div class="col mx-2">
                                                      <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">TIPO</span>
                                                            </div>
                                                            <input name="tipo" id="tipo" type="text" class="form-control" value="<?php echo $servView['tipo'] ;?>">
                                                        </div>
                                                  </div>
                                                </div>
                                                <hr>
                                                <input type="hidden" name="operacao" id="operacao" value="atualizar">
                                                <input type="hidden" name="idServ" id="idServ" value="<?php echo $servView['id']; ?>">
                                                <button type="button" class="btn btn-danger btn-fill pull-left mx-2 mt-2" onclick='showAlert("<?php  echo $servView['nome'] ?>","<?php  echo $servView['id'] ?>","remover")' <?php if($servView['id']==0){ echo 'disabled';}?>>Remover</button>  
                                                <button type="submit" class="btn btn-primary btn-fill pull-right mx-2 mt-2" <?php if($servView['id']==0){ echo 'disabled';}?>>Atualizar</button>                                  
                                        </form>
                                    </div>             
                                </div>
                            </div>
                        </div>                                         
                </div>
        </div>
        </div>
        <form id="formServico" name="formServico" class="form row-form justify-content-center" action="php/cadastroServico.php" method="POST">
                  <div class="modal fade" id="modalCadastroServico" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <h3 class="text-dark text-center">Novo Servico</h3>
                        <div class="modal-body">
                        
                        <div class="row">
                            <div class="col mx-2 mb-3">
                              <label for="nome">Nome do Servico</label>
                              <input type="servicename" class="form-control" id="nome" name="nome" placeholder="Servico" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mx-2">
                                <label for="descricao">Descrição</label>
                                <textarea name="descricao" id="descricao" class="form-control desc mb-3" required rows="5" ></textarea>
                            </div>       
                        </div>

                        <div class="row">
                            <div class="col mx-2">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">R$/30 min</span>
                                    </div>
                                    <input type="price" class="form-control" placeholder="2019,99" name="preco" id="preco" required>
                                </div>
                            </div>

                            <div class="col mx-2">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">TIPO</span>
                                    </div>
                                    <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Corporal" required>
                                </div>
                            </div>
                        </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger mx-2 " data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-success mx-2">Cadastrar</button>
                        </div>
                      </div>
                    </div>           
                  </div>
        </form>
        <?php require_once "php/printFooter.php"?> 
        </div>
        </div>   
    </div>
</body>
<!--   Core JS Files   -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<!-- <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script> -->
<script type="text/javascript" src="js/popper-1.14-7.min.js"></script>
<script type="text/javascript" src="js/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="js/plugins/chartist.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-notify.js"></script>
<script type="text/javascript" src="js/light-bootstrap-dashboard.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript">   
    $(document).ready(function () {
        $('#formImagem').on('change', "input#imagem", function (e) {
            e.preventDefault();
            $("#formImagem").submit();
        });
    });
</script>

<script type="text/javascript">
    function showAlert(nome, id, operacao){
        mensagem = "Você está prestes a remover o servico \n" + nome +".\nDeseja Continuar?";
        var r = confirm(mensagem);
        if (r == true){ //Usuário clicar em OK
            $.ajax({
                data: 'idServ=' + id + '&remover=' + operacao,
                url: 'php/atualizarServico.php',
                method: 'POST', 
            });
            window.location = 'servicos.php?msg=servicoremovido';     
            sleep(1000).then(() => {
                location.reload(true);
            })
            
        }
        else{// Usuário clicar em cancelar
        }
        

    }
</script>


</html>