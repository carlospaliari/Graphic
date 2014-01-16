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
    <title>Paliari</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>

<body>
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