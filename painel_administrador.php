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
  <?php
    require_once("config.php");
    if (!isset($_SESSION["administrador"])) {
      header("Location: plogin.php");
    }
  ?>

<body class="bg">

  <div class="ui grid container stackable">
    <div class="sixteen wide column">
      <div class="ui center aligned segment">
        <h4 class=>Painel do administrador, seja bem vindo <?=$_SESSION["administrador"]["nome"]?></h4>
      </div>
    </div>
    <div class="sixteen wide column">
      <div class="ui floating labeled icon dropdown button left floated">
        <i class="filter icon"></i>
        <span class="text">Filtro</span>
        <div class="menu">
          <div class="header">
            <i class="tags icon"></i>
            Selecionar usuários
          </div>
          <div class="divider"></div>
          <div class="item">
            <i class="attention icon"></i>
            Administradores
          </div>
          <div class="item">
            <i class="comment icon"></i>
            Organizadores
          </div>
          <div class="item">
            <i class="conversation icon"></i>
            Estudantes
          </div>
        </div>
      </div>
      <button class="ui positive button left floated" id="filterButton">Filtrar</button>
      <button class="ui negative button right floated" id="signOutButton">Deslogar</button>
      <button class="ui primary button right floated" id="addUserButton">Adicionar Usuário</button>
    </div>
    <div class="sixteen wide column">
      <table class="ui unstackable table">
        <?php
          require_once("listagem.php");
        ?>
      </table>
      
    </div>
  </div>

  <!-- Janela Modais -->
  <div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
      Perfil do estudante 
    </div>
    <div class="image content">
      <div class="ui medium image">
        <img src=<?=$url?>>
      </div>
      <div class="description">
        <div class="ui header">Dados</div>
          
        </div>
      </div>
      <div class="actions">
      <div class="ui black deny button">
        Sair
      </div>
    </div>
  </div>
  
  <script src="css-js/jquery-3.3.1.min.js"></script>
  <script src="css-js/Semantic-UI-CSS-master/semantic.min.js"></script>
  <script src="css-js/js-aditional.js"></script>
  <script>
    $(document).ready(function(){
      $(".ui.icon").dropdown();
      $("#filterButton").click(function(){
        var userType = $(".ui.icon").dropdown('get text').trim().toLowerCase();
        var type = userType.toLowerCase();
        window.location.href = "http://localhost/projeto_grily/actions.php?action=selecionar_usuario&tipo=" + type;
      });
      $("#addUserButton").click(function(){
        window.location.href = "http://localhost/projeto_grily/pregistro.php";
      }); 
      $("#signOutButton").click(function(){
        window.location.href = "http://localhost/projeto_grily/actions.php?action=deslogar"
      });
      $('.ui.accordion').accordion();
      $('#userAccount').click(function(){
        var id = $('#userAccount').attr("value");
        alert(id);
      });
    });
    
  </script>
</body>
</html>