<main role="main" class="container">

        <div class='well col-md-8 col-xs-offset-2'>
            <h2>Log in</h2>
            <form action="login.php" method="post" class='form form-horizontal'>
                <div class='form-group'>
                    <label class='control-label col-xs-4' for="email">Email:</label>
                    <div  class=' col-xs-8'>
                        <input type="email" name="mail"  class='form-control'
                               required  value >
                    </div>
                </div>


                <div class='form-group'>
                    <label class='control-label col-xs-4' for="password1">Password:</label>
                    <div  class=' col-xs-8'>
                        <input type="password" name="heslo"  class='form-control'>
                    </div>
                </div>

                <div class='col-xs-offset-3 col-xs-6'>

                    <input type='submit' name='register' class='form-control btn btn-primary' value="Log in!">
                </div>
            </form>
        </div>


