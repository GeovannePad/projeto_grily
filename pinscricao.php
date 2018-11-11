<!doctype html>
<html lang="pt-BR">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <form method="POST" action="actions.php?action=inscrever">
          <div class="form-group row">
            <label for="inputNome" class="col-sm-1-12 col-form-label">Nome</label>
            <div class="col-sm-1-12">
              <input type="text" class="form-control" name="nome" id="inputNome">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputDtnascimento" class="col-sm-1-12 col-form-label">Data de nascimento</label>
            <div class="col-sm-1-12">
              <input type="date" class="form-control" name="dtnascimento" id="inputDtnascimento">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputFone" class="col-sm-1-12 col-form-label">Número do celular</label>
            <div class="col-sm-1-12">
              <input type="text" class="form-control" name="fone" id="inputFone">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEndereco" class="col-sm-1-12 col-form-label">Endereço</label>
            <div class="col-sm-1-12">
              <input type="text" class="form-control" name="endereco" id="inputEndereco">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputCurso" class="col-sm-1-12 col-form-label">Curso</label>
            <div class="col-sm-1-12">
              <select class="form-control" name="curso" id="inputCurso">
                <option value="1">Teatro</option>
                <option value="4">Artes</option>
                <option value="3">Música</option>
                <option value="2">Dança</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputBio">Biografia</label>
            <textarea class="form-control" name="biografia" id="inputBio" rows="3"></textarea>
          </div>
          

          <div class="form-group row">
            <div class=" col-sm-10">
              <button type="submit" class="btn btn-primary">Inscrever</button>
            </div>
          </div>
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>