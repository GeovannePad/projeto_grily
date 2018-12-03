<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css-js/css-aditional.css">
    <link rel="stylesheet" href="css-js/Semantic-UI-CSS-master/semantic.min.css">
    <script src="main.js"></script>
</head>

<body class="bg">
<?php require_once("navbar.php"); ?>
    <div class="banner">
        <img src="midia/predio-frente2.jpg" class="banner-image">
        <p class="text-light display-4 centrodois"><i class="child icon"></i> Dança</p>
    </div>
 
<div class="ui justified container">
    <br><br>
    <p class="font-big">Nossos alunos tem a liberdade para escolher o tipo de dança do qual gostaria de aprender. Os mais populares são:
    <div class="ui piled segment">
        <div class="font-big ui grid">
            <div class="six wide column">
                <img src="/midia/hip-hop.jpg" class="ui large image" alt=""> 
            </div>  
            <div class="ten wide column">
                <p><h2>Hip Hop (Street dance) <div class="ui huge star rating"></div></h2>
                Mais do que um estilo de dança influenciado por vários ritmos, a dança de rua sempre foi associada à cultura e a identidade negra, sobretudo a partir da década de 70. Nesse período, o movimento que teve início com a dança se estendeu para outras manifestações culturais e artísticas, como a pintura, a poesia, o grafite e o visual (modo de se vestir, de andar, etc.). A esse novo estilo nascido nos guetos nova-iorquinos (Bronx, Brooklin e Harlem) deu-se o nome de Hip – Hop. Em aulas desse estilo praticamos com os alunos: Movimentos fortes,sincronizados e harmoniosos,rápidos,simétricos e assimétricos.</p>
            </div>
        </div>
    </div>
    <div class="ui piled segment">
        <div class="font-big ui grid">
            <div class="six wide column">
                <img src="/midia/ballet.jpg" class="ui large image" alt=""> 
            </div>  
            <div class="ten wide column">
                <p><h2>Ballet <div class="ui huge star rating" data-rating="4"></div></h2>
                É um tipo de dança influente a nível mundial que possui uma forma altamente técnica e um vocabulário próprio. Este gênero de dança é muito difícil de dominar e requer muita prática. Ele é ensinado em todo o mundo possui diferentes técnicas, entre elas mímica e atuação, são coreografadas e realizadas por artistas formados e também acompanhadas por arranjos musicais.</p>
            </div>
        </div>
    </div>
    <div class="ui piled segment">
        <div class="font-big ui grid">
            <div class="six wide column">
                <img src="/midia/jazz.jpg" class="ui large image" alt=""> 
            </div>  
            <div class="ten wide column">
                <p><h2>Jazz <div class="ui huge star rating"></div></h2>
                O Jazz é uma forma de expressão pessoal criada e sustentada pelo improviso. É possível descrever essa dança como uma manifestação corporal acompanhada de música, marcada pela polirritmia (quando o corpo acompanha vários ritmos simultaneamente), movimentos sincopados (quando há rompimento dos movimentos já internalizados e estabelecem-se outros padrões de movimentos) e pelo swing. Ainda que a influência da música jazz seja bastante intensa sobre a constituição dessa dança, sua prática não necessariamente é acompanhada desse estilo de música, o que permite ao praticante liberdade também na escolha musical.</p>
            </div>
        </div>
    </div>
    <br>
</div>























    <footer class="colorTwo">
        <div class="ui center aligned container">
            <br>
            <h1>GRILY</h1>
            <i class="facebook icon"></i>
            <i class="twitter icon"></i>
            <i class="instagram icon"></i>
            <i class="fort awesome icon"> </i>
            <div class="ui divider"></div>
            <p>Escola de arte GRILY é uma escola de artes, fundada em 2000 por Marco Nanini, que já está a mais de 40
                anos no mercado, formando verdadeiros profissionais na arte.
                <br><br><strong>© Todos os direitos reservados. Fundação GRILY</strong></p>
            <br>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
    <script src="css-js/js-aditional.js"></script>
    <script src="css-js/Semantic-UI-CSS-master/semantic.min.js"></script>
    <script>
        $('.special .image').dimmer({
            on: 'hover'
        });
        $('.ui.rating')
            .rating({
                initialRating: 5,
                maxRating: 5
            })
            ;
    </script>
</body>

</html>