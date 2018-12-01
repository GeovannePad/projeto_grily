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
      <table class="table">
        <thead>
          <th>RM</th>
          <th>Nome</th>
          <th>Data de nascimento</th>
          <th>Endereço</th>
          <th>Telefone</th>
          <th>Curso</th>
          <th>Biografia</th>
          <th>Organizador que aprovou</th>
        </thead>
        <tbody>
          <?php
            require_once("config.php");
            $estudantes = new Estudante();
            $resultados = $estudantes->selectAllEstudantes();
            foreach ($resultados as $resultado) {
              echo "<tr>";
              foreach ($resultado as $key => $value) {
                echo "<td>";
                if ($key == "idcurso") {
                  if ($value == 1) {
                    echo "Teatro";
                  } else if ($value == 2){
                    echo "Dança";
                  } else if ($value == 3){
                    echo "Música";
                  } else {
                    echo "Artes";
                  }
                  continue;
                }
                if ($key == "dtnascimento") {
                  $data = new DateTime($value);
                  $value = $data->format("d-m-Y");
                  echo $value;
                  continue;
                }
                if ($key == "idestudante") {
                  $idusuario = $resultado["idusuario"];
                  echo "<a class='btn btn-danger' href='actions.php?action=apagar_estudante&idestudante=$value&idusuario=$idusuario' role='button'>Deletar</a>";
                  continue;
                }
                if ($key == "idusuario") {
                  continue;
                }
                echo $value;
                echo "</td>";
              }
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
      <a class="btn btn-primary" href="painel_organizador.php" role="button">Painel das incrições</a>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>