<!doctype html>
<html lang="pt-BR">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="css-js/Semantic-UI-CSS-master/semantic.min.css">
    <!-- Site Properties -->
    <title>Alterar senha</title>
    <link rel="stylesheet" type="text/css" href="css-js/Semantic-UI-CSS-master/semantic.css">
    <link rel="stylesheet" type="text/css" href="css-js/css-aditional.css">

    <script src="assets/library/jquery.min.js"></script>
    <script src="../dist/components/form.js"></script>
    <script src="../dist/components/transition.js"></script>
    </head>
    <body style="background-color: #FFA500">
    <?php
        require_once("config.php");
        if (!isset($_SESSION["estudante"])) {
            header("Location: plogin.php?err=logar");
        }
    ?>
    <div class="ui container">
        <div class="ui grid">
        <div class="five wide column"></div>
        <div class="top-margin2 six wide column">
            <div class="ui piled segment">
                <h3 class="ui dividing header">Alterar senha</h3>
                    <form class="ui form" id="form" method="POST" action="actions.php?action=alterar_senha">
                        <div class="field">
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" name="senha"><br>
                        </div>
                        <div class="field">
                            <label for="inputSenhaConf">Confirmar senha</label>
                            <input type="password" id="inputSenhaConf" name="senhaConf"><br>
                        </div>
                        <button form="form" type="submit" class="ui right floated inverted orange centered button">Trocar senha</button>
                    </form>
                <br><br>
                </div>
        </div>
            <div class="five wide column"></div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
    <script src="css-js/Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
<<<<<<< HEAD
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
=======
    // just for the demos, avoids form submit

>>>>>>> 6235aa740ff8bf5d7533a7659b60b98f78b30697
        $( "#form" ).validate({
            rules: {
                senha: {
                    required: true,
                    minlength: 8
                },
                senhaConf: {
                    required: true,
                    minlength: 8,
                    equalTo: "#senha"
                }
            }
        });
    </script>
    </body>
</html>