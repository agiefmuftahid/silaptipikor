 <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="POST">
                         <?= $notifikasi ?>
                            <fieldset>
                                <div class="form-group">
                            <input class="form-control" placeholder="Username" name="username" type="text" required="">
                                </div>
                                <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" required="">
                                </div>
                                <div class="checkbox">
                                   
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" value="Login" class="btn btn-primary"> 
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
