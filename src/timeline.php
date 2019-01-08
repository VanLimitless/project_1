
<?php
include 'header.php';
include 'includes/connection.php';
    $sql=$conn->prepare("SELECT * FROM posts ORDER BY id DESC;");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
 foreach ($result as $value){

?>
<main role="main" class="container">
<div class="timeline">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $value['title'];?>
            </h5>
            <h6 class="card-subtitle text-muted">
                <?php echo $value['autor'];
                if (isset($_SESSION["prihlasen"])){
                    if ($_SESSION["prihlasen"]==$value["autor"]){
                        echo " <a href='edituj.php?id={$value["id"]}'>Editovat prispevek</a>";
                        echo " <a href='smaz.php?id={$value["id"]}'>Smazat prispevek</a>";
                    }
                }?>
            </h6>
        </div>
        <div class="card-body">
            <p class="card-text">
                <?php echo $value['body'];?>
            </p>
        </div>
        <div class="card-footer text-muted">
            <?php echo $value['date'];?>
        </div>
    </div>
<?php
 }
?>




<?php
    include 'footer.php';
?>
