<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Painel Administrador</title>
  <link rel="stylesheet" href="css-js/Semantic-UI-CSS-master/semantic.min.css">
  <link rel="stylesheet" href="css-js/css-aditional.css">
</head>
<body>
  <script src="css-js/"></script>
</body>
</html>
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