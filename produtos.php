<!DOCTYPE html>
<html lang="pt--br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Systhetics · Produtos</title>
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

    <?php require "DAO/produtoDAO.php";
        $produtoDAO = new ProdutoDAO(); 
        $busca = ""; 
        $produtos = $produtoDAO->listar($busca);
        if(isset($_GET['id'])){
            $prodView = $produtoDAO->get($_GET['id']);
            if(!isset($prodView)){
                header('location:produtos.php');
            }
        }
        else{
            $prodView['id']=0;
            $prodView['nome']='Nome do Produto';
            $prodView['descricao']='Essa é a descrição do produto. Para editar um produto, clique em seus respectivos campos.';
            $prodView['foto']='img/produto/default.png';
            $prodView['preco']=1.99;
            $prodView['quantidade']=10;
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($_GET['msg'])){
            switch($_GET['msg']){
                case "sucesso":
                    $mensagem = "Produto cadastrado com sucesso!" ;
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
                case "usuarioremovido":
                    $mensagem = "Usuário removido com sucesso!" ;
                    $icon = 'nc-icon nc-simple-remove';
                    $colortype = 'success'; 
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
                                    <h4 class="card-title">Produtos</h4>
                                    <p class="card-category">Produtos disponíveis para venda</p>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-2 ml-3" >
                                            <a class="btn btn-success form-control" role="button" data-toggle="modal" data-target="#modalCadastroProduto">
                                                <i><strong> Novo</strong></i>
                                            </a>
                                        </div>
                                        <div class="col mr-3">
                                            <input class="form-control" type="search" name="search" placeholder="Pesquisar">
                                        </div>                                           
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <?php
                                        if(count($produtos) != 0){
                                            foreach($produtos as $produto){
                                                ?>

                                                <a href="produtos.php?id=<?php echo $produto['id'];?>" class="list-group-item text-center d-flex justify-content-between align-items-center list-group-item-action <?php if($produto['id'] == $prodView['id']){ echo "active";}?>">
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

                        <div class="col-md-5">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img class="img-cover" src="img/banner.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <form id="formImagem" name="formImagem" action="php/atualizarImagemProduto.php" method="POST" enctype="multipart/form-data">
                                            <label for="imagem">                           
                                                <p class="mt-1">
                                                    <img class="avatar pic border-gray imgperfil" src="<?php echo $prodView['foto'] ;?>" alt="profile">
                                                </p>    
                                            </label>
                                            <input id="imagem" name="imagem" type="file" accept="image/*">
                                            <input type="hidden" name="email" id="email" value="<?php echo $prodView['nome'] ;?>">
                                            <input type="hidden" name="id" id="id" value = "<?php echo $prodView['id'] ;?>">
                                        </form>

                                        <form id="formProduto" name="formProduto" action="" method="POST">
                                            <div class="row">
                                                <div class="col mx-2 ">
                                                  <label for="nome"></label>
                                                  <input type="productname" class="text-success form-control inpt borderless" id="nome" name="nome" value="<?php echo $prodView['nome'] ;?>" required>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col mx-2">
                                                    <textarea class="form-control desc my-3" rows="5" name="description" id="description" form="formProduto"><?php echo $prodView['descricao'];?> </textarea>
                                                </div>       
                                              </div>

                                                <div class="row">
                                                  <div class="col mx-2">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">R$</span>
                                                            </div>
                                                            <input type="price" class="form-control" placeholder="2019,99" aria-label="price" aria-describedby="price" value="<?php echo $prodView['preco'] ;?>">
                                                        </div>
                                                  </div>

                                                  <div class="col mx-2">
                                                      <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">UN</span>
                                                            </div>
                                                            <input type="quantity" class="form-control" placeholder="10" aria-label="quantity" aria-describedby="quantity" value="<?php echo $prodView['quantidade'] ;?>">
                                                        </div>
                                                  </div>
                                                </div>
                                                <hr>
                                                <button type="submit" class="btn btn-primary btn-fill pull-right mx-2 mt-2" <?php if($prodView['id']==0){ echo 'disabled';}?>>Atualizar</button>                                  
                                        </form>
                                    </div>             
                                </div>
                            </div>
                        </div>                                         
                </div>
        </div>
        </div>
        <form id="formProduto" name="formProduto" class="form row-form justify-content-center" action="php/cadastroProduto.php" method="POST">
                  <div class="modal fade" id="modalCadastroProduto" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <h3 class="text-dark text-center">Novo Produto</h3>
                        <div class="modal-body">
                        
                        <div class="row">
                            <div class="col mx-2 mb-3">
                              <label for="nome">Nome do Produto</label>
                              <input type="productname" class="form-control" id="nome" name="nome" placeholder="Produto" required>
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
                                        <span class="input-group-text" id="basic-addon1">R$</span>
                                    </div>
                                    <input type="price" class="form-control" placeholder="2019,99" name="preco" id="preco" required>
                                </div>
                            </div>

                            <div class="col mx-2">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">UN</span>
                                    </div>
                                    <input type="quantity" name="quantidade" id="quantidade" class="form-control" placeholder="10" required>
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


</html>