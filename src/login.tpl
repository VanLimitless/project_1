
<script>
    function url_replace() {
        var myWindow = window.open("timeline.php", "_self");
    }

</script>


<?php

include "header.php";

include "loginform.php";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (!empty($_POST['mail'])&&!empty($_POST['heslo'])){
        include 'includes/connection.php';
        try {
            $dot=$conn->prepare("SELECT * FROM users WHERE email=:mail;");
            $dot->bindParam('mail',$_POST['mail']);
            $dot->execute();
            $result = $dot->fetchAll(PDO::FETCH_ASSOC);
            if ($result!=null) {
                $heslo = hash('sha256',$_POST['heslo']);
                if ($result[0]["password"] == $heslo) {
                    $_SESSION['prihlasen'] = $result[0]['email'];
                    echo "<br>";
                    echo "prihlaseno";

                    echo "
                    <script>
                    url_replace();
                    </script>
                    
                    ";



                } else {
                    echo "Bad password";
                }
            } else {
                echo "Unknown user";
            }
        } catch (Exception $e) {
            echo "chyba dotazu ".$e;
        }
    }
} else {
    //kdyby nahodou
}




include 'footer.php';
