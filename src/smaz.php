<?php
session_start();
if (isset($_SESSION["prihlasen"])&&isset($_GET["id"])){
    include "includes/connection.php";
    $sql=$conn->prepare("DELETE FROM posts WHERE id=:id");
    $sql->bindParam("id",$_GET["id"]);
    $sql->execute();
    header('Location: timeline.php');
} else {
    header('Location: index.php');
}