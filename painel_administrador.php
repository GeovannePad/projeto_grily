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
      <form action="painel_administrador.php" method="get">
        <div class="form-group">
          <label for="inputTipo">Usuário:</label>
          <select class="form-control" name="tipo" id="inputTipo">
            <option value="Administrador">Administradores</option>
            <option value="Organizador">Organizadores</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Selecionar</button>
        <hr>
      </form>
      <table class="table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Login</th>
            <th>Senha</th>
            <th>Tipo</th>
            <th>Data de registro</th>
          </tr>
        </thead>
        <tbody>
          <?php 

            require_once("config.php");
            $usuarios = new Usuario();
            if (isset($_GET["tipo"])) {
              $tipo = $_GET["tipo"];
            } else {
              $tipo = "Administrador";
            }
            $resultados = $usuarios->selectUsuariosByTipo($tipo);
            foreach ($resultados as $resultado) {
              echo "<tr>";
              foreach ($resultado as $key => $value) {
                echo "<td>";
                if ($key == "dtregistro") {
                  $data = new DateTime($value);
                  $value = $data->format("d-m-Y");
                  echo $value;
                  continue;
                }
                if ($key == "idusuario") {
                  echo "<a class='btn btn-danger' href='actions.php?action=apagar_usuario&idusuario=$value' role='button'>Excluir</a>";
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
      <a class="btn btn-primary" href="painel_estudantes.php" role="button">Painel dos estudantes</a>
      <a class="btn btn-primary" href="painel_usuarios.php" role="button">Painel dos usuários</a>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>