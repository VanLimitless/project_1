<?php

class Model
{
    private $db = null;
    private $view = null;
    private $chyba=null;
    public function __construct()
    {
        include 'includes/connection.php';
        $this->db=$conn;
    }

    public function zpracujLogin($mail, $pass){


        try {
            $dot=$this->db->prepare("SELECT * FROM users WHERE email=:mail;");
            $dot->bindParam('mail',$mail);
            $dot->execute();
            $result = $dot->fetchAll(PDO::FETCH_ASSOC);
            if ($result!=null) {
                $heslo = hash('sha256',$pass);
                if ($result[0]["password"] == $heslo) {
                    $_SESSION['prihlasen'] = $result[0]['email'];
                    header('location:timeline.php');

                } else {
                    $this->chyba = "Bad password";
                }
            } else {
                $this->chyba =  "Unknown user";
            }
        } catch (Exception $e) {
            //echo "chyba dotazu ".$e;
        }
    }
    public function zpracujRegistraci($mail, $pass){
        $dot=$this->db->prepare("INSERT INTO users (email, password) VALUES (:mail, :heslo);");
        $dot->bindParam('mail',$mail);
        $heslo = hash("sha256", $pass);
        $dot->bindParam('heslo',$heslo);
        try{
            $dot->execute();
            $_SESSION['prihlasen']=$mail;
            header('location:timeline.php');
        } catch (Exception $e){

        }
    }
    public function vratPrispevky(){

        if(isset($_POST['tlacitko'])) {
            $input = $_POST['stav'];
            $sql = $this->db->prepare("SELECT * FROM posts ORDER BY id $input");

            if ($input=="DESC"){
                $this->chyba = "Seřazeno od nejnovějšího příspěvku...";
            }
            else
            {
                $this->chyba =  "Seřazeno od nejstaršího příspěvku...";
            }

        }
        else
        {$sql = $this->db->prepare("SELECT * FROM posts ORDER BY id DESC");}


        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function pridejPrispevek($autor, $timestamp, $nazev, $prispevek){
        try {
            $sql =$this->db->prepare("INSERT INTO posts (autor, date, title, body)
                                     VALUES (:autor, :ts, :title, :body);");
            $sql->bindParam("autor",$autor);
            $sql->bindParam("ts",$timestamp);
            $sql->bindParam("title",$nazev);
            $sql->bindParam("body",$prispevek);
            $sql->execute();
            header('Location: timeline.php');

        } catch (PDOException $e) {
            echo "chyba db " . $e;
        }
    }
    public function smazPrispevek($id){
        $sql=$this->db->prepare("DELETE FROM posts WHERE id=:id");
        $sql->bindParam("id",$id);
        $sql->execute();
        header('Location: timeline.php');
    }
    public function vratPrispevekEditace(){
        if (isset($_SESSION["prihlasen"])&&isset($_GET["id"])){
            $sql=$this->db->prepare("SELECT * FROM posts WHERE id = :id;");
            $sql->bindParam("id",$_GET["id"]);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            //echo $result[0]["title"];
            //echo $result[0]["body"];
        } else {
            header('Location: index.php');
        }
        return $result;
    }
    public function editujPrispevek($id, $nazev, $prispevek){
        try {
            $sql =$this->db->prepare("UPDATE posts SET title = :title, body=:body WHERE id = :id");
            $sql->bindParam("id",$id);
            $sql->bindParam("title",$nazev);
            $sql->bindParam("body",$prispevek);
            $sql->execute();
            header('Location: timeline.php');

        } catch (PDOException $e) {
            echo "chyba db " . $e;
        }
    }
    public function nastavChybu($chyba){
        $this->chyba.="<br>".$chyba;
    }
    public function vratChybu(){
        return $this->chyba;
    }
}