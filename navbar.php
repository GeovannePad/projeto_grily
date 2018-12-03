<nav class="navbar navbar-expand-md navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="">GRILY</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="sobre.php">Sobre nós</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Cursos
                        </a>
                        <div class="dropdown-menu colorTree" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="teatro.php">Teatro</a>
                            <a class="dropdown-item" href="danca.php">Dança</a>
                            <a class="dropdown-item" href="pintura.php">Pintura</a>
                            <a class="dropdown-item" href="musica.php">Música</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="midia.php">Mídia</a>
                    </li>
                    <?php 
                        require_once("config.php"); 
                        if (!isset($_SESSION["estudante"])) {
                            echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="pinscricao.php">Cadastre-se</a></li>';
                        }else{
                            echo ' <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Estudante
                                        </a>
                                        <div class="dropdown-menu colorTree" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="perfil_estudante.php">Perfil</a>
                                            <a class="dropdown-item" href="actions.php?action=deslogar">Sair</a>
                                        </div>
                                    </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

                   