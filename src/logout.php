<?php
session_start();
$_SESSION['prihlasen']=null;
session_destroy();
header('Location: index.php');
?>