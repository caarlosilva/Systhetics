<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Systhetics · Vendas</title>
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
    <?php require "DAO/produtoDAO.php";

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        } 
        if(!isset($_SESSION) || $_SESSION['admin'] != 1){
            header('Location:index.php?msg=erropermissao');
        }

        $produtoDAO = new ProdutoDAO(); 
        $busca = ""; 
        $produtos = $produtoDAO->listar($busca);

        if(isset($_SESSION['produtos'])){
            $carrinho = $_SESSION['produtos'];
        }
        else{
            $carrinho = null;
        }
        if(isset($_GET['id'])){
            $prodSelected = $produtoDAO->get($_GET['id']);
            if(!isset($prodSelected)){
                header('location:vendas.php');
            }
        }         

        

        if(isset($_GET['msg'])){
            switch($_GET['msg']){
                case "sucesso":
                    $mensagem = "Venda Realizada com Sucesso!" ;
                    $icon = 'nc-icon nc-single-02';
                    $colortype = 'primary'; 
                    break;
                case "errosenha":
                    $mensagem = "As senhas informadas diferem entre si. Por favor, tente novamente!";
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'danger';
                    break;
                case "carrinhovazio":
                    $mensagem = "Todos os itens foram removidos do carrinho!" ;
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'primary'; 
                    break;
                case "prodadd":
                    $mensagem = "Produto adicionado ao Carrinho." ;
                    $icon = 'nc-icon nc-simple-add';
                    $colortype = 'primary'; 
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
                    <div class="col-md-6">
                            <div class="card border border-dark">
                                <div class="card-header">
                                    <h4 class="card-title">Produtos</h4>
                                    <p class="card-category">Produtos disponíveis para venda</p>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">                                      
                                        <div class="col mr-3">
                                            <input class="form-control border border-dark" type="search" name="search" placeholder="Pesquisar">
                                        </div>
                                        <div class="col-2  text-center " >
                                            <a class="nav-link border border-dark rounded-right <?php if(isset($_GET['id'])){ echo 'btn-primary text-black'; }?>" role="button" data-toggle="modal"  <?php if(isset($prodSelected)) echo 'data-target="#modalAddCarrinho"'?>>
                                                <i class="fa fa-cart-plus fa-lg"></i>
                                            </a>
                                        </div>                                           
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <?php
                                        if(count($produtos) != 0){
                                            foreach($produtos as $produto){
                                                ?>
                                                <a href="vendas.php?id=<?php echo $produto['id'];?>" class="list-group-item text-center d-flex justify-content-between align-items-center list-group-item-action <?php if($produto['id'] == $prodSelected['id']){ echo "active";}?>">
                                                    <img class="pic"src="<?php echo $produto['foto']; ?>" width="64" height="64">                                  
                                                    <p>
                                                        <?php echo $produto['nome']; ?><br>                                                  
                                                        <span> R$: <?php echo $produto['preco']; ?></span>
                                                    </p>
                                                    <span class="badge <?php if ($produto['quantidade'] <= 0) { echo 'badge-danger';}elseif($produto['quantidade'] <= 10){echo 'badge-warning';}else{ echo 'badge-success';}?> badge-pill">Quantidade: <?php echo $produto['quantidade'];?></span>
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
                                                        <p>Não existem produtos cadastrados no sistema.</p>
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

                        <div class="col-md-6">
                            <div class="card card-user border border-dark">
                                <div class="card-header">
                                    <h4 class="card-title">Carrinho</h4>
                                    <p class="card-category text-left">Produtos no seu carrinho aparecerão aqui</p>
                                    <p class="text-right mr-2"><i class="fa fa-shopping-cart fa-lg"></i></p>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                            
                                        <form id="formCarrinho" name="formCarrinho" action="php/finalizarVenda.php" method="POST">
                                            <div class="list-group list-group-flush">
                                                <?php
                                                    if(count($carrinho) != 0){
                                                        foreach($carrinho as $produtoCarrinho){
                                                            
                                                            $prod = $produtoDAO->get($produtoCarrinho['id']);
                                                            ?>
                                                            <input type="hidden" name="idProd" id="idProd" value="<?php echo $prod['id']; ?>">
                                                            <a href="#" class="list-group-item text-center d-flex justify-content-between align-items-center list-group-item-action">                             
                                                                <span class="text-primary">
                                                                    <b><?php echo $produtoCarrinho['qtdVenda'];?> UN</b> - <?php echo $prod['nome']; ?>                                                
                                                                </span>
                                                                <span class="badge badge-success badge-pill">Valor: R$ <?php echo $produtoCarrinho['qtdVenda'] * $prod['preco'] ;?>
                                                                </span>
                                                            </a>

                                                        <?php
                                                        }
                                                    }
                                                    else{ 
                                                        ?>
                                                        <div class="col px-0">
                                                            <div class="jumbotron jumbotron-fluid text-center">
                                                                <i class="fa fa-shopping-cart fa-5x"></i>
                                                                <div class="container">                                                                 
                                                                    <h1>Carrinho Vazio</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php 
                                                    }
                                                ?>
                                            </div>
                                                <p class="text-right text-primary my-2">
                                                    <b>TOTAL: R$ 
                                                    <?php 
                                                        if(count($carrinho) != 0){
                                                            $total = 0;
                                                            foreach($carrinho as $produtoCarrinho){
                                                                $prod = $produtoDAO->get($produtoCarrinho['id']);
                                                                $total += $produtoCarrinho['qtdVenda'] * $prod['preco'];
                                                            }
                                                            echo $total;
                                                            echo "<input type=hidden name=total id=total value=".$total.">";
                                                        }else{
                                                            echo "0,00";
                                                        }

                                                    ?>
                                                </b>
                                                </p>
                                                <hr>
                                                <input type="hidden" name="operacao" id="operacao" value="atualizar">                                              
                                                <button type="button" class="btn btn-danger btn-fill pull-left mx-2 mt-2" onclick='showAlert()' <?php if(!isset($carrinho)){ echo 'disabled';}?>>Limpar</button>  
                                                <button type="submit" class="btn btn-primary btn-fill pull-right mx-2 mt-2" <?php if(!isset($carrinho)){ echo 'disabled';}?>>Finalizar Venda</button>                                  
                                        </form>
                                    </div>             
                                </div>
                            </div>
                        </div>                                         
                </div>
        </div>
        </div>

        <form id="formAdd" name="formAdd" class="form row-form justify-content-center" action="php/adicionarCarrinho.php" method="POST" >
          <div class="modal fade" id="modalAddCarrinho" role="dialog" >
            <div class="modal-dialog"  >
              <div class="modal-content modal-prod">
                <h3 class="text-dark text-center">Adicionar ao Carrinho</h3>
                <div class="modal-body">
                
                <div class="row">
                    <input type="hidden" name="idProduto" id="idProduto" value ="<?php echo $prodSelected['id'] ;?>">
                    <div class="col mx-2 mb-3">
                      <label for="nome">Nome do Produto</label>
                      <input type="productname" class="form-control" id="nome" name="nome" value="<?php echo $prodSelected['nome'];?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col mx-2">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control desc mb-3" value="" disabled rows="5" ><?php echo $prodSelected['descricao'];?></textarea>
                    </div>       
                </div>

                <div class="row">
                    <div class="col-3 mx-2">
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                            </div>
                            <input type="number" name="precoVenda" id="precoVenda" class="form-control" value="<?php echo $prodSelected['preco'];?>"  disabled>
                        </div>
                    </div>

                    <div class="col-3 mx-2">
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Estoque</span>
                            </div>
                            <input type="quantity" name="quantidade" id="quantidade" class="form-control" value="<?php echo $prodSelected['quantidade'];?>" disabled>
                        </div>
                    </div>

                    <div class="col mx-2">
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Quantidade de Venda</span>
                            </div>
                            <input type="number" name="qtdVenda" id="qtdVenda" min="1" max="<?php echo $prodSelected['quantidade']?>" class="form-control" required>
                        </div>
                    </div>
                </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger mx-2 " data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success mx-2">Adicionar</button>
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
    function showAlert(){
        mensagem = "Deseja limpar os produtos do carrinho?";
        var r = confirm(mensagem);
        if (r == true){ //Usuário clicar em OK
            $.ajax({
                data: '',
                url: 'php/limparCarrinho.php',
                method: 'POST', 
            });
            window.location = 'vendas.php?msg=carrinhovazio';     
            sleep(1000).then(() => {
                location.reload(true);
            })
            
        }
        else{// Usuário clicar em cancelar
        }      
    }
</script>

</html>