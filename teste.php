<?php

include "Tpl.php";

$tmp = new Tpl();

$props = array(
    array('JAN', 300),
    array('FEV', 400),
    array('MAR', 500),
    array('ABR', 100),
    array('MAI', 900),
    array('JUN', 600),
    array('JUL', 700),
    array('AGO', 500),
    array('SET', 600),
    array('OUT', 800),
    array('NOV', 200),
    array('DEZ', 800),
);
echo $tmp->sample($props);