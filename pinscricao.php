<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscrição</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css-js/css-aditional.css">
    <link rel="stylesheet" href="css-js/Semantic-UI-CSS-master/semantic.min.css">

    <script src="main.js"></script>
</head>

<body class="bg">
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
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="pinscricao.php">Cadastre-se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="banner">
        <img src="midia/predio-frente2.jpg" class="banner-image">
        <p class="text-light display-4 centrodois">Formulário de cadastro</p>
    </div>
  
<br><br>
<div class="container">
        <form class="ui form" id="form" method="POST" action="actions.php?action=inscrever">
          <div class="field">
            <label for="inputNome" class="col-sm-1-12 col-form-label">Nome</label>
              <input type="text" class="form-control" name="nome" id="inputNome">
          </div>
<div class="two fields">
          <div class="field">
            <label for="inputDtnascimento" class="col-sm-1-12 col-form-label">Data de nascimento</label>
              <input type="date" class="form-control" name="dtnascimento" id="inputDtnascimento">
          </div>

          <div class="field">
            <label for="inputFone" class="col-sm-1-12 col-form-label">Número do celular</label>
              <input type="text" class="form-control" name="fone" id="inputFone">
          </div>
</div>
          <div class="field">
            <label for="inputEndereco" class="col-sm-1-12 col-form-label">Endereço</label>
              <input type="text" class="form-control" name="endereco" id="inputEndereco">
          </div>
<div class="two fields">
          <div class="field">
            <label for="inputCurso" class="col-sm-1-12 col-form-label">Curso</label>
              <select class="form-control" name="curso" id="inputCurso">
                <option value="1">Teatro</option>
                <option value="4">Artes</option>
                <option value="3">Música</option>
                <option value="2">Dança</option>
              </select>
          </div>

          <div class="field">
            <label for="inputBio">Biografia</label>
            <textarea class="form-control" name="biografia" id="inputBio" rows="3"></textarea>
          </div>
          </div>

          <div class="field">
              <input type="submit" class="ui inverted brown button" value="Inscrever-se">
          </div>
        </form>
      </div>
<div class="ui center aligned container">
    <p>Já se inscreveu? Faça <a href="plogin.php">login!</a></p></div>


<br><br><br><br><br>




    <footer class="colorTwo">
        <div class="ui center aligned container">
            <br>
            <h1>GRILY</h1>
            <i class="facebook icon"></i>
            <i class="twitter icon"></i>
            <i class="instagram icon"></i>
            <i class="fort awesome icon"> </i>
            <div class="ui divider"></div>
            <p>Escola de arte GRILY é uma escola de artes, fundada em 2000 por Marco Nanini, que já está a mais de 40
                anos no mercado, formando verdadeiros profissionais na arte.
                <br><br><strong>© Todos os direitos reservados. Fundação GRILY</strong></p>
            <br>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
    <script src="css-js/js-aditional.js"></script>
    <script src="css-js/Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
    // just for the demos, avoids form submit
    jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
    });
    $( "#form" ).validate({
    rules: {
        nome: {
            required: true
        },
        dtnascimento: {
            required: true
        },
        fone: {
            required: true
        },
        endereco: {
            required: true
        },
        curso: {
            required: true
        }
    }
    });
    </script>
    <script>
        $('.special .image').dimmer({
            on: 'hover'
        });
    </script>
</body>

</html>