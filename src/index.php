<?php
include 'load.php';
$stranka='index';
$model = new Model();
$controller= new Controller($model);
$view = new View($stranka,$model,$controller);
$view->vypisStranku();
?>
