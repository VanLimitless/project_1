<?php
class View
{
    private $stranka;
    private $model;
    private $controller;

    public function __construct($stranka, $model, $controller)
    {
        $this->stranka=$stranka;
        $this->model=$model;
        $this->controller=$controller;
    }
    public function vypisStranku(){
        include ("header.php");
        switch ($this->stranka){
            case ("index"):
                include ("index.tpl");
                break;
            case ("login"):
                include ("loginform.php");
                echo "<br>".$this->model->vratChybu();
                break;
            case ("registrace"):
                include ("registrform.html");
                echo "<br>".$this->model->vratChybu();
                break;
            case ("timeline"):
                $result = $this->model->vratPrispevky();
                echo $this->model->vratChybu();
                include ("timeline.tpl");
                break;
            case ("addpost"):
                include ("addpost.tpl");
                break;
            case ("edituj"):
                $result = $this->model->vratPrispevekEditace();
                include ("edituj.tpl");
                break;
            default:
                include ("index.tpl");
                break;
        }
        include ("footer.php");
    }
}