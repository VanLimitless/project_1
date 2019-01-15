<script>
    function url_replace2() {
        setTimeout(function(){

            var myWindow = window.open("timeline.php", "_self");

        }, 3000);

    };

</script>

<?php
include 'header.php';

include "registrform.html";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $mail_user=$_POST['mail'];
    if (!empty($_POST['mail'])&&!empty($_POST['heslo'])){
        if ($_POST['heslo'] == $_POST['hesloznovu']) {
            include 'includes/connection.php';
            $dot=$conn->prepare("INSERT INTO users (email, password) VALUES (:mail, :heslo);");
            $dot->bindParam('mail',$_POST['mail']);
            $heslo = hash("sha256", $_POST['heslo']);
            $dot->bindParam('heslo',$heslo);
            echo "";
            echo "<br>";
            echo "<h5>Byl jste registrován s mailem" .$mail_user." </h5>";
            echo "<br>";
            echo "Probíhá přesměrování na hlavní zeď....";
            echo "
                    <script>
                   url_replace2();
                    </script>
                   ";

            try{
                $dot->execute();
                $_SESSION['prihlasen']=$_POST['mail'];
            } catch (Exception $e){

            }
        }
    }
} else {

}

include 'footer.php';
?>
