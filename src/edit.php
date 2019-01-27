<?php
include 'load.php';
if (!isset($_SESSION['prihlasen'])){
    header('Location: index.php');
}
$model = new Model();
$controller= new Controller($model);
$controller->editacePrispevku();
header ("Location: timeline.php")
?>