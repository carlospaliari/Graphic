<?php

include "Tpl.php";


if ($_POST) {
    $props = array();
    foreach ($_POST as $k => $v) {
        if ("max" != $k && $v) {
            $props[] = array($k, $v);
        }
    }
    $tpl = new Tpl();

    $grafico = $tpl->sample($props, $_POST['max']);
}
extract($_POST);
?>

<html>
<head>
    <title>Graficos</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>

<body>
<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://paliari.url.ph">Paliari</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="http://paliari.url.ph/bd/social/social.html">Social</a></li>
            <li><a onclick="alert('Desculpe mas esta funcao ainda nao foi desenvolvida')" href="#">Fale conosco</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acesse <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="http://paliari.url.ph/bd/calculadora/calculadora.html">Calculadora</a></li>
                    <li><a href="http://paliari.url.ph/bd/index.php">Mensgens</a></li>
                    <li class="divider"></li>
                    <li><a href="http://paliari.url.ph">Voltar</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>

<div class="container">
    <br>
    Grafico de notas:
    <br><br>

    <form method="post">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                Essas sao as notas minimas e maximas, com elas serao feitas as medias e depois insira as outras notas veja a seguir o
                <a
                    href="https://www.dropbox.com/s/fo5vdlcovq4jfo9/Captura%20de%20tela%20de%202014-01-16%2013%3A56%3A21.png"
                    role="button">
                    Exemplo
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="max" value="0" placeholder="Insira a nota minima possivel">
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="max" value="100" placeholder="Insira a nota maxima possivel">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="nota1" placeholder="Insira sua nota">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="nota2" placeholder="Insira sua nota">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="nota3" placeholder="Insira sua nota">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="nota4" placeholder="Insira sua nota">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="nota5" placeholder="Insira sua nota">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="nota6" placeholder="Insira sua nota">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="nota7" placeholder="Insira sua nota">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="nota8" placeholder="Insira sua nota">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                <input min="0" max="100" class="form-control" type="number" name="nota9" placeholder="Insira sua nota">
            </div>
        </div>

        <button class="btn btn-primary" type="submit">
            Enviar
            <i class="fa fa-arrow-right"></i>
        </button>
    </form>

    <h4>Media:</h4>

    <?php
    echo $grafico;

    ?>

</div>
</body>
</html>