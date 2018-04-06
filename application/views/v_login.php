<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
  	<div class="col-md-3 col-md-offset-2 image">
        <img src="assets/img/Picture1.png" style=width:300px;height:300px;">
    </div>
    <div class="col-md-4 form-login">
    
    <?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>

        <div class="outter-form-login">
        <div class="logo-login">
        </div>
            <form action="check-login.php" class="inner-login" method="post">
            <h2 class="text-center title-login">User Login</h2>
            <br>
            	<center><b>Username</b></center>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
            	<center><b>Password</b></center>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <br>
                <input type="submit" class="btn btn-block btn-custom-green" value="Login" />
            </form>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>