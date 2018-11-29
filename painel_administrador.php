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
  <div class="ui grid container stackable">
    <div class="sixteen wide column">
      <div class="ui center aligned segment">
        <h4 class=>Painel do administrador, seja bem vindo (session)</h4>
      </div>
    </div>
    <div class="ui vertical segment">
      <div class="two wide column">
        <div class="ui floating labeled icon dropdown button" id="filtroDropdown">
          <i class="filter icon"></i>
          <span class="text">Filter</span>
          <div class="menu">
            <div class="header">
              <i class="tags icon"></i>
              Filter by tag
            </div>
            <div class="divider"></div>
            <div class="item">
              <i class="attention icon"></i>
              Important
            </div>
            <div class="item">
              <i class="comment icon"></i>
              Announcement
            </div>
            <div class="item">
              <i class="conversation icon"></i>
              Discussion
            </div>
          </div>
        </div>
        
      </div> 
      </div>
      <div class="twelve wide column">
        
      </div>
      <div class="two wide column">

      </div>
    </div>
  </div>
  
  <script src="css-js/jquery-3.3.1.min.js"></script>
  <script src="css-js/Semantic-UI-CSS-master/semantic.min.js"></script>
  <script src="css-js/js-aditional.js"></script>
  <script>
    $("#filtroDropdown")
    .dropdown();
  </script>
</body>
</html>
<?php 

/*require_once("config.php");
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
*/
?>