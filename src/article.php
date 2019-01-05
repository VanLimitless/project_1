<?php
include_once ('includes/connection.php');
include_once ('includes/article.php');

$article = new Article();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $article->fetch_data($id);

    ?>

<?php
} else {
    header('Location: index.php')
        exit();



}

?>

