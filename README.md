Graphics
========

Projeto para criação de gráficos simples


*Instalação*

Para instalar basta incluir este projeto ao seu sistema, posteriormente invocar a classe Tpl de acordo com o exemplo abaixo.

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

depois de um echo no grafico para o local onde deseja colocar.

    <?php
    echo $grafico;

    ?>

exemplo --> http://paliari.url.ph/bd/calculos_media/index.php