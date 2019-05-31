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
    <link href="css/style.css" rel="stylesheet" type="text/css" >

    <!--     -->   
    <?php require "DAO/clienteDAO.php";
        $cDAO = new ClienteDAO(); 
        $busca = "";
        $clientes = $cDAO->listar($busca);  

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(!isset($_SESSION) || $_SESSION['admin'] != 1){
            header('Location:index.php?msg=erropermissao');
        }

        if(isset($_GET['msg'])){
            switch($_GET['msg']){
                case "sucesso":
                    $mensagem = "Cliente <strong>adicionado</strong> com sucesso!" ;
                    $icon = 'nc-icon nc-single-02';
                    $colortype = 'primary'; 
                    break;
                case "errosenha":
                    $mensagem = "As senhas informadas diferem entre si. Por favor, tente novamente!";
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'danger';
                    break;
                case "erroemail":
                    $mensagem = "O e-mail inserido já existe!" ;
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'danger'; 
                    break;
                case "clienteremovido":
                    $mensagem = "Cliente <strong>removido</strong> com sucesso!" ;
                    $icon = 'nc-icon nc-simple-remove';
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
                        <div class="col-md-12">
                            <div class="card striped-tabled-with-hover border border-dark">
                                <div class="card-header ">
                                    <h3 class="card-title">Clientes</h3>
                                    <p class="card-category">Clientes cadastrados no sistema</p>
                                </div>
                                <div class="card-body table-full-width">
                                    <div class="row mb-4">
                                        <div class="col-2 ml-3" >
                                            <a class="btn btn-success form-control border border-dark" id="btCad" role="button" data-toggle="modal" data-target="#modalCadastroCliente">
                                                <i><strong> Novo</strong></i>
                                            </a>
                                        </div>
                                        <div class="col mr-3">
                                            <input class="form-control border border-dark" type="search" name="search" placeholder="Pesquisar">
                                        </div>                                           
                                    </div>

                                    <table class="table table-hover table-striped" width="100%">
                                        <thead>
                                            <th></th>
                                            <th>Nome</th>
                                            <th>Telefone 1</th>
                                            <th>Endereço</th>
                                            <th>Cidade</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(count($clientes) != 0){
                                                    foreach($clientes as $cliente){?>
                                                        <div class="col px-0 mb-4">
                                                            <tr>
                                                                <td>
                                                                    <a class="text-right" href="perfilCliente.php?id=<?php echo $cliente['id']; ?>">
                                                                        <img class="rounded-circle ml-2 pic" href="perfilCliente.php?id=<?php echo $cliente['id']; ?>" src="<?php echo $cliente['foto']; ?>" width='24' height='24'>
                                                                    </a>
                                                                </td>
                                                                <td><?php echo $cliente['nome']; ?></td>
                                                                <td><?php echo $cliente['tel1']; ?></td>
                                                                <td><?php echo $cliente['rua'] . ", " . $cliente['num'];?></td>
                                                                <td><?php echo $cliente['cidade']; ?> - <?php echo $cliente['estado']; ?></td>
                                                                <td class="text-right">
                                                                <a>
                                                                    <img class="mr-2" src="img/remove.png" alt="Remove" width="32px" height="24px" onclick='showAlert("<?php echo $cliente['nome'];?>", "<?php echo $cliente['id'];?>", "remover")'>
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
                                                                <p>Nenhum cliente cadastrado no sistema.</p>
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
                  <div class="modal fade" id="modalCadastroCliente">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <h3 class="text-dark text-center modal-title">Cadastro de Cliente</h3>
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
                                    <div class="col-3">
                                        <label class="mb-0 mt-2" for="cep">CEP</label>
                                        <input type="cep" class="form-control" id="cep" name="cep" placeholder="00000-000" required>
                                    </div>                                                
                                </div>
                                <div class="row">           
                                    <div class="col">
                                        <label class="mb-0 mt-2" for="rua">Rua</label>
                                        <input type="address" class="form-control" id="rua" placeholder="Rua dos Bobos" name="rua">
                                    </div>
                                    <div class="col-2">
                                        <label class="mb-0 mt-2" for="num">N°</label>
                                        <input type="num" class="form-control" id="num" placeholder="1278" name="num" required>
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
<!-- <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> -->
<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script> 
<script type="text/javascript" src="js/popper-1.14-7.min.js"></script>
<script type="text/javascript" src="js/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="js/light-bootstrap-dashboard.js"></script>

<script type="text/javascript" src="js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap-notify.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/jquery.mask.1.14.11.min.js"></script>
<script type="text/javascript" src="js/masks.js"></script> 
<script type="text/javascript" src="js/consultaCEP.js"></script>

<script type="text/javascript">
    function showAlert(nome, id, operacao){
        mensagem = "Você está prestes a remover o cliente \n" + nome +".\nDeseja Continuar?";
        var r = confirm(mensagem);
        if (r == true){ //Usuário clicar em OK
            $.ajax({
                data: 'id=' + id + '&operacao=' + operacao,
                url: 'php/atualizarCliente.php',
                method: 'POST', 
            });
            window.location = 'clientes.php?msg=clienteremovido';     
            sleep(1000).then(() => {
                location.reload(true);
            })
            
        }
        else{// Usuário clicar em cancelar
        }      
    }
</script>

</html>