<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreePicture - LOGIN</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      	<div class="col-md-5" style="padding-left: 130px; padding-top: 180px; padding-bottom: 170px">
            <img src="assets/img/WebsiteLogo.png" style=width:380px;height:250px;">
        </div>
        <div class="col-md-5 form-login" style="padding-left: 150px;">
        
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
    </div>
  </body>
</html>