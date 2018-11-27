<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" media="screen" href="css-js/css-aditional.css">
  <link rel="stylesheet" href="css-js/Semantic-UI-CSS-master/semantic.min.css">
  <link rel="stylesheet" href="css-js/Semantic-UI-CSS-master/components/modal.css">
  <style>
    .esconderInputs {
      display: none;
    }
    .form-button {
      display: none;
    }
    #imageInput {
      display: inline-block;
    }
  </style>
</head>
<?php 
require_once("config.php"); 
if (!isset($_SESSION["estudante"])) {
  header("Location: plogin.php?err=logar");
}
if ($_SESSION["estudante"]["imagem"] == "user-icon.png") {
  $url = "midia/user-icon.png";
} else {
  $url = "midia/imagens_estudantes/" . $_SESSION["estudante"]["imagem"];
}
?>
<body style="background-color: lightgrey;">

  <div class="ui fourteen column centered grid container stackable">

    <div class="fourteen wide column ui segment">
      <div class="ui grid container stackable">

        <div class="row">
          <div class="two wide column"></div>
            <div class="twelve wide column">
            <img src=<?= $url ?> alt="User Photo" class="ui medium centered circular fluid image" style="height:400px; width:400px; margin-bottom: 10px;">
            <button class="ui primary fluid alterbutton button">Alterar imagem</button>
          </div>
          <div class="two wide column"></div>
        </div>

        <div class="row">
          <div class="two wide column "></div>
          <div class="center aligned twelve wide column hidden content">
          <form action="actions.php?action=alterar_dados" method="POST" class="ui form" id="dataForm">
          <table class="ui single line table stackable dados">
              <thead>
                <th colspan="2">Dados Pessoais</th>
              </thead>
              <tbody>
                <tr>
                  <td>RM</td>
                  <td><?= $_SESSION["estudante"]["rm"]?></td>
                </tr>
                <tr>
                  <td>E-mail</td>
                  <td><?= $_SESSION["estudante"]["login"]?></td>
                </tr>
                <tr>
                  <td>Nome Completo</td>
                  <td>
                    <span class="dataSpan"><?= $_SESSION["estudante"]["nome"]?></span>
                    <input class="esconderInputs inputData" type="text" name="nome" value="<?= $_SESSION["estudante"]["nome"]?>">
                  </td>
                </tr>
                <tr>
                  <td>Data de nascimento</td>
                  <td>
                    <span class="dataSpan"><?=$_SESSION["estudante"]["dtnascimento"]?></span>
                    <?php
                      $dateString = $_SESSION["estudante"]["dtnascimento"];
                      $myDateTime = DateTime::createFromFormat('d/m/Y', $dateString);
                      $newDateString = $myDateTime->format('Y-m-d');
                    ?>
                    <input class="esconderInputs inputData" type="date" name="dtnascimento" value="<?=$newDateString?>">
                  </td>
                </tr>
                <tr>
                  <td>Endereço</td>
                  <td>
                    <span class="dataSpan"><?= $_SESSION["estudante"]["endereco"]?></span>
                    <input class="esconderInputs inputData" type="text" name="endereco" value="<?= $_SESSION["estudante"]["endereco"]?>">
                  </td>
                </tr>
                <tr>
                  <td>Curso</td>
                  <td><?= $_SESSION["estudante"]["idcurso"]?></td>
                </tr>
                <tr>
                  <td>Telefone</td>
                  <td>
                    <span class="dataSpan"><?= $_SESSION["estudante"]["fone"]?></span>
                    <input class="esconderInputs inputData" type="text" name="fone" value="<?= $_SESSION["estudante"]["fone"]?>">
                  </td>
                </tr>
                <tr>
                  <td>Biografia</td>
                  <td>
                    <span class="dataSpan"><?= $_SESSION["estudante"]["biografia"]?></span>
                    <textarea class="esconderInputs inputData" name="biografia">
                    <?= $_SESSION["estudante"]["biografia"]?>
                    </textarea>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
            
          </div>
          <div class="two wide column"></div>
        </div>
        <div class="row">
          <div class="two wide column"></div>
          <div class="twelve wide column">
            <a class="ui left floated primary button data-button" id="senhabutton" role="button">Alterar Senha</a>
            <a class="ui right floated negative button data-button" href="actions.php?action=deslogar" role="button">Sair</a>
            <button class="ui right floated negative button form-button" form="dataForm" id="botaoCancelar" type="reset">Cancelar</button>
            <button class="ui right floated positive button form-button" form="dataForm" type="submit">Alterar</button>
            <a class="ui right floated primary button data-button" role="button" id="botaoEditar">Editar</a>
          </div>
          <div class="two wide column"></div>
        </div>
        
      </div>
    </div>
  </div>
    <div class="ui tiny modal senha">
      <div class="content right floated">
        <form action="actions.php?action=alterar_senha" id="form-senha" class="ui form senha=form" method="POST">
        <div class="inline field">
          <div class="ui right pointing label">
            Sua senha deve 8 caracteres ou mais!
          </div>
          <input type="password" name="senha" id="inputSenha" placeholder="Nova Senha">
        </div>
        </form>
      </div>
      <div class="actions">
        <div class="ui buttons">
          <button type="reset" class="ui negative button" form="form-senha">Cancelar</button>
          <div class="or"></div>
          <button type="submit" class="ui positive button" form="form-senha">Alterar</button>
        </div>
      </div>
    </div>
  <div class="ui coupled modal image">
    <div class="header">Upload de imagem</div>
    <i class="close icon"></i>

    <div class="image content">
      <div class="ui fluid medium circular image">
        <div id="imagemModal"></div>
      </div>
      <div class="description">
        <form action="actions.php?action=alterar_imagem" id="imageForm" method="post" class="ui form" enctype="multipart/form-data">
          <div class="field">
            <label>Foto</label>
            <input type="file" name="imagem" id="imageInput">
          </div>
        </form>
      </div>
    </div>
    <div class="actions">
      <div class="ui buttons">
        <div class="ui negative button">Cancelar</div>
        <div class="or"></div>
        <button type="submit" class="ui positive button vazio" form="imageForm">Enviar</button>
      </div>
    </div>
  </div>

  <div class="ui small coupled modal vazio">
    <div class="ui icon header"></div>
    <div class="content">
      <p>Você não selecionou nenhuma imagem, tente novamente!</p>
    </div>
    <div class="actions">
      <button class="ui green ok inverted button" href="perfil_estudante.php">
        <i class="checkmark icon"></i>
        Ok!
      </button>
    </div>
  </div>
  <div class="ui small coupled modal grande">
    <div class="ui icon header"></div>
    <div class="content">
      <p>A imagem excedeu o tamanho limite permitido (20MB), por favor, selecione outra!</p>
    </div>
    <div class="actions">
      <button class="ui green ok inverted button" href="perfil_estudante.php">
        <i class="checkmark icon"></i>
        Ok!
      </button>
    </div>
  </div>
  <div class="ui small coupled modal tipoerrado">
    <div class="ui icon header"></div>
    <div class="content">
      <p>A extensão dessa imagem/arquivo não é permitida, apenas são permitidas imagens do tipo PNG, JPG e JPEG. Por favor, selecione outra!</p>
    </div>
    <div class="actions">
      <button class="ui green ok inverted button" href="perfil_estudante.php">
        <i class="checkmark icon"></i>
        Ok!
      </button>
    </div>
  </div>
  <script src="css-js/jquery-3.3.1.min.js"></script>
  <script src="css-js/js-aditional.js"></script>
  <script src="css-js/Semantic-UI-CSS-master/semantic.min.js"></script>

  <script>
    
    $(document).ready(function(){
      $(".form-button").hide();
      <?php
      if ($_SESSION["estudante"]["imagem"] == "user-icon.png") {
        echo "'var imagem_usuario = midia/usericon.png';";
      } else {
        $imagem = $_SESSION["estudante"]["imagem"];
        echo "var imagem_usuario = 'midia/imagens_estudantes/$imagem';";
      }
      
      ?>
      var imagem = $("#imagemModal");
      $("<img />", {
        "src": imagem_usuario,
        "class": "thumb-image",
        "style": "height:200px;width:300px;",
      }).appendTo(imagem);
      $('.coupled.modal')
      .modal({
        allowMultiple: true
      });
      $(".alterbutton").click(function(){
      $('.modal.image')
      .modal("show");
    });
    $("#senhabutton").click(function(){
      $('.modal.tiny.senha')
      .modal("show");
    });
    $("input:file").change(function(){
      if (typeof (FileReader) != "undefined") {
        var imagem = $("#imagemModal");
        imagem.empty();
        var reader = new FileReader();
        reader.onload = function (e) {
          $("<img />", {
            "src": e.target.result,
            "class": "thumb-image",
            "style": "height:200px;width:300px;",
          }).appendTo(imagem);
        }
        imagem.show();
        reader.readAsDataURL($(this)[0].files[0]);
      } else{
        alert("Este navegador nao suporta FileReader.");
      }
    });

    $("#botaoEditar").click(function(){
      $(".inputData").show();
      $(".dataSpan").hide();
      $(".data-button").hide();
      $(".form-button").show();

    });
    $("#botaoCancelar").click(function(){
      $(".inputData").hide();
      $(".form-button").hide();
      $(".dataSpan").show();
      $(".data-button").show();
    });
    


  });
    

  <?php
    if (isset($_GET["err_senha"]) && $_GET["err_senha"] == "vazio") {
      echo 'var erro_senha="vazio"';
    } else if (isset($_GET["err_senha"]) && $_GET["err_senha"] == "pequena"){
      echo 'var erro_senha="pequena"';
    }
    if (isset($_GET["err_imagem"])) {
      switch ($_GET["err_imagem"]) {
        case 'vazio':
          echo 'var erro = "vazio";';
        break;
        case 'grande':
          echo 'var erro = "grande";';
        break;
        case 'tipo_errado':
          echo 'var erro = "tipo_errado";';
        break;
    default:
        echo 'var erro = "nada";';
      break;
  }
}
?>
  if (erro_senha == 'vazio') {
    $('.coupled.vazio.senha')
    .modal("show");
  }
  if (erro_senha == 'pequena') {
    $('.coupled.pequena')
    .modal("show");
  }
  if(erro == 'vazio'){
    $('.coupled.vazio')
      .modal("show");
  }
  if(erro == 'grande'){
    $('.coupled.grande')
    .modal("show");
  }
  if (erro == 'tipo_errado') {
    $('.coupled.tipoerrado')
    .modal("show");
  }
  </script>
</body>
</html>
