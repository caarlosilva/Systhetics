<nav class="navbar navbar-expand-lg " color-on-scroll="500">
     <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ?>
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href="#"> Systhetics </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">pallete &nbsp;</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">99</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Pesquisar</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="" href="#">
                                    <img class="rounded-circle mx-0" src="img/usuario/default.png" alt="Profile" width="32" height="32">   
                                </a>                                         
                                <a class="nav-link" href="#">                 
                                    <span><strong>
                                        <?php 
                                            $firstname = explode(" ", $_SESSION['nome']);
                                            echo  $firstname[0] ;
                                        ?>                        
                                    </strong></span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Exportar</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Imprimir</a>
                                    <a class="dropdown-item" href="#">Salvar PDF</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Explodir Tudo</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">
                                    <span class="no-icon">Sair</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
</nav>