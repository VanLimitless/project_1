<div class="starter-template">
    <h1>Music Land</h1>
<form method="post" action="#">
    <select name="stav" id="select">
        <option value="" >------- Seřazení článku -------</option>
        <option value="DESC" >Seřadit podle nejnovějšího příspěvku</option>
        <option value="ASC" >Seřadit podle nejstaršího příspěvku</option>
    </select>
    <input id='submit' type="submit" name="tlacitko" value="Submit" style="display: none;">
</form>
    <script>
        $(document).ready(function() {
            $('#select').on('change', function() {
                $('#submit').click();
            });
        });
    </script>
 </div>
<br>
    <div class="card-body">
<?php
 foreach ($result as $value){
?>
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
    </div>
