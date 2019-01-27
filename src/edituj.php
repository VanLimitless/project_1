<?php
include 'load.php';
$stranka='edituj';
$model = new Model();
$controller= new Controller($model);
$view = new View($stranka,$model,$controller);
$view->vypisStranku();
?>
