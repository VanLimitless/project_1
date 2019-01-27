<?php

class Controller
{
    private $model=null;
    public function __construct($model)
    {
        $this->model=$model;
        $this->zpracujData();
    }
    public function zpracujData(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (!empty($_POST['mail'])&&!empty($_POST['heslo'])&&!isset($_POST['hesloznovu']))
            {
            $this->model->zpracujLogin($_POST["mail"],$_POST["heslo"]);
            }
            if (!empty($_POST['mail'])&&!empty($_POST['heslo'])&&!empty($_POST['hesloznovu']))
            {
                if ($_POST['heslo'] == $_POST['hesloznovu']) {
                    $this->model->zpracujRegistraci($_POST["mail"],$_POST["heslo"]);
                } else {
                    $this->model->nastavChybu("Zadana hesla se neshoduji");
                }
            }
            if(isset($_POST['register'])){
                if($_POST['captcha'] != $_SESSION['digit'])

                    echo "Špatně vložená CAPTCHA..";

                else {
                    //když je CAPTCHA správná
                    if (!empty($_POST['nazev'])&&!empty($_POST['prispevek'])){
                        include("includes/connection.php");
                        $nazev = $_POST["nazev"];
                        $prispevek = $_POST["prispevek"];
                        $timestamp = date('Y-m-d G:i:s');
                        $autor=$_SESSION['prihlasen'];
                        $this->model->pridejPrispevek($autor,$timestamp,$nazev,$prispevek);
                    }
                }
            }
        }
    }

    public function smazaniPrispevku()
    {
        if (isset($_SESSION["prihlasen"])&&isset($_GET["id"])){
            $this->model->smazPrispevek($_GET["id"]);
        } else {
            header('Location: index.php');
        }

    }
    public function editacePrispevku()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (!empty($_POST['nazev'])&&!empty($_POST['prispevek'])&&!empty($_POST['id'])){
                $nazev = $_POST["nazev"];
                $prispevek = $_POST["prispevek"];
                $id = $_POST["id"];
                $this->model->editujPrispevek($id,$nazev,$prispevek);
            }
        }
    }
}