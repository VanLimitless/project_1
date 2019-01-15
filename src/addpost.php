


<?php
include 'header.php';
if (!isset($_SESSION['prihlasen'])){
    header('Location: index.php');
}
?>
<?php

error_reporting(E_ALL & ~E_NOTICE);
?>



<main role="main" class="container">
    <div class='well col-md-8 col-xs-offset-2'>
        <h2>New Post</h2>

        <form id='register-form' class='form form-horizontal' method='POST' action="#">

            <div class='form-group'>
                <label class='control-label col-xs-4' for="title">Title:</label>
                <div  class=' col-xs-8'>
                    <input id='title' name='nazev' class='form-control' type="text"
                           required  >
                </div>
            </div>
            <div class='form-group'>
                <label class='control-label col-xs-4' for="post">Text:</label>
                <div  class=' col-xs-8'>
                    <textarea id='post' name='prispevek' class='form-control' required rows='4' cols="50">

                    </textarea>
                </div>
            </div>

            <p><img src="captcha.php" width="120" height="30" border="1" alt="CAPTCHA"></p>
            <p><input type="text" size="6" maxlength="5" name="captcha" value="" required><br>
                <small>prosím, opište kód a pokračujte..</small></p>



            <?php
            if(isset($_POST['register'])){

                if($_POST && "all required variables are present") {



                    if($_POST['captcha'] != $_SESSION['digit'])

                    echo "Špatně vložená CAPTCHA..";

                    else

                    {
                            //sem to, když CAPTCHA je správná
                            if (!empty($_POST['nazev'])&&!empty($_POST['prispevek'])){
                                include("includes/connection.php");
                                $nazev = $_POST["nazev"];
                                $prispevek = $_POST["prispevek"];
                                $timestamp = date('Y-m-d G:i:s');
                                $autor=$_SESSION['prihlasen'];
                                try {
                                    $sql =$conn->prepare("INSERT INTO posts (autor, date, title, body)
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

                                $conn = null;



                        }
                    }



                }
            }
            ?>


            <div class='col-xs-offset-3 col-xs-6'>
                <input type='submit' name='register' class='form-control btn btn-primary' value="Post it!">
            </div>
        </form>


    </div>

    <hr>





    <hr>

    </form>







    <?php
    include 'footer.php';
    ?>
