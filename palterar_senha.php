<!doctype html>
<html lang="pt-BR">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    
    <!-- Site Properties -->
    <title>Alterar senha</title>
    <link rel="stylesheet" type="text/css" href="css-js/Semantic-UI-CSS-master/semantic.css">
    <link rel="stylesheet" type="text/css" href="css-js/css-aditional.css">

    <script src="assets/library/jquery.min.js"></script>
    <script src="../dist/components/form.js"></script>
    <script src="../dist/components/transition.js"></script>
    </head>
    <body>
    <?php
        require_once("config.php");
        if (!isset($_SESSION["estudante"])) {
            header("Location: plogin.php?err=logar");
        }
    ?>
    <form id="form" method="POST" action="actions.php?action=alterar_senha">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha"><br>
        <label for="inputSenhaConf">Confirmar senha</label>
        <input type="password" id="inputSenhaConf" name="senhaConf"><br>
        <button form="form" type="submit">Trocar senha</button>
    </form>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
    // just for the demos, avoids form submit

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