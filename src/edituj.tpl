<main role="main" class="container">
<form id='register-form' class='form form-horizontal' method='POST'  action="edit.php">
    <div class='form-group'>
        <label class='control-label col-xs-4' for="title">Title:</label>
        <div  class=' col-xs-8'>
            <input id='title' name='nazev' class='form-control' type="text"
                   required value="<?=$result[0]["title"]?>" >
        </div>
    </div>
    <div class='form-group'>
        <label class='control-label col-xs-4' for="post">Text:</label>
        <div  class=' col-xs-8'>
                    <textarea id='post' name='prispevek' class='form-control' required rows='4' cols="50">
                    <?= $result[0]["body"]?>
                    </textarea>
        </div>
    </div>
    <input type="hidden" id="id" name="id" value="<?= $_GET["id"]?>">
    <div class='col-xs-offset-3 col-xs-6'>
        <input type='submit' name='register' class='form-control btn btn-primary' value="Post it!">
    </div>
</form>