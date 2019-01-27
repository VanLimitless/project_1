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

            <div class='col-xs-offset-3 col-xs-6'>
                <input type='submit' name='register' class='form-control btn btn-primary' value="Post it!">
            </div>
        </form>


    </div>

    <hr>
    <hr>

    </form>