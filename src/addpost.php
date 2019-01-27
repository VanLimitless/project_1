<?php
include 'load.php';
$stranka='addpost';
if (!isset($_SESSION['prihlasen'])){
    header('Location: index.php');
}
$model = new Model();
$controller= new Controller($model);
$view = new View($stranka,$model,$controller);
$view->vypisStranku();
?>
