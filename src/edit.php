<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (!empty($_POST['nazev'])&&!empty($_POST['prispevek'])&&!empty($_POST['id'])){
        include("includes/connection.php");
        $nazev = $_POST["nazev"];
        $prispevek = $_POST["prispevek"];
        $id = $_POST["id"];
        try {
            $sql =$conn->prepare("UPDATE posts SET title = :title, body=:body WHERE id = :id");
            $sql->bindParam("id",$id);
            $sql->bindParam("title",$nazev);
            $sql->bindParam("body",$prispevek);
            $sql->execute();
            header('Location: timeline.php');

        } catch (PDOException $e) {
            echo "chyba db " . $e;
        }

        $conn = null;
    }
}
?>