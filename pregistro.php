<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  
    <!-- Site Properties -->
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="css-js/Semantic-UI-CSS-master/semantic.css">
    <link rel="stylesheet" type="text/css" href="css-js/css-aditional.css">

    <script src="assets/library/jquery.min.js"></script>
    <script src="../dist/components/form.js"></script>
    <script src="../dist/components/transition.js"></script>
  </head>
  <body>
  <div class="container">
        <form method="POST" id="form" action="actions.php?action=registrar_usuario">
          <div class="form-group row">
            <label for="inputNome" class="col-sm-1-12 col-form-label">Nome</label>&nbsp;
            <div class="col-sm-1-12">
              <input type="text" class="form-control" name="nome" id="inputNome">
            </div>
          </div>
          <div class="form-group row">
            <label for="setLogin" class="col-sm-1-12 col-form-label">Login</label>&nbsp;
            <div class="col-sm-1-12">
              <input type="text" class="form-control" name="login" id="inputLogin">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputSenha" class="col-sm-1-12 col-form-label">Senha</label>&nbsp;
            <div class="col-sm-1-12">
              <input type="password" class="form-control" name="senha" id="inputSenha">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-1-12">
              <select class="form-control" name="tipo">
                <option value="">Selecione o tipo de usuário</option>
                <option value="Administrador">Administrador</option>
                <option value="Organizador">Organizador</option>
              </select>
            </div>
          </div>
          

      
          <div class="form-group row">
            <div class=" col-sm-10">
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
          </div>
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    
    <!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $( "#form" ).validate({
            rules: {
                nome: {
                  required: true
                },
                login: {
                  required: true
                },
                senha: {
                  required: true,
                  minlength: 8
                },
                tipo: {
                  required: true
                }
            }
        });
    </script>
  </body>
</html>