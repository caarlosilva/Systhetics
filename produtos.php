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

    <?php require "DAO/produtoDAO.php";
        $produtoDAO = new ProdutoDAO(); 
        $busca = ""; 
        $produtos = $produtoDAO->listar($busca);
    ?>

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
                    <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Produtos</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <?php
                                        if(count($produtos) != 0){
                                            foreach($produtos as $produto){
                                                ?>
                                                <li class="list-group-item text-center d-flex justify-content-between align-items-center">
                                                    <a href="">
                                                        <img class=""src="<?php echo $produto['foto']; ?>" width="64" height="64">                                  
                                                    </a>
                                                    <p>
                                                        <strong><?php echo $produto['nome']; ?></strong> <br>                                                  
                                                        <span> R$: <?php echo $produto['preco']; ?></span>
                                                    </p>
                                                    

                                                    <span class="badge badge-primary badge-pill">Quantidade: <?php echo $produto['quantidade']; ?></span>
                                                </li>
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
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- -->

                        <div class="col-md-7">
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
                            </div>
                        </div>                                         
                </div>

            <div class="row">
                <?php
                if(count($produtos) != 0){
                    foreach($produtos as $produto){
                        ?>

                        <!--
                        <div class="col-md-auto content-align-center px-auto">
                            <div class="card" style="width: 14rem;">
                                <img class="card-img-top" src="<?php echo $produto['foto']; ?>">
                                <div class="card-body text-center">
                                    <h4 class="card-title text-primary"><?php echo $produto['nome']; ?></h4>
                                    <p class="card-text"><?php echo $produto['descricao']; ?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="php/viewProduto.php?id=<?php echo $produto['id']; ?>" class="btn btn-block">Ver</a>
                                </div>
                            </div>
                        </div>
                    -->
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
        </div> 
        <?php require_once "php/printFooter.php"?>    
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

</html>