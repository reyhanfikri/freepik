<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreePicture</title>
    <link href="<?php echo site_url('assets/css/bootswatch/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/bootswatch/style.css') ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/style2.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body style="background: WHITE;">
  	<nav class="navbar navbar-expand-lg navbar-light navcolor" style="height: 50px;">
	  <div class="container">
		  <a class="navbar-brand" href="<?php echo site_url() ?>"><img height="35px" width="35px" src="<?php echo site_url('assets/img/WebsiteLogo2.png') ?>"></a>
		  <div class="topnav">
  			<div class="search-container">
    		  <form action="<?php echo site_url('cari_gambar'); ?>" method="get">
	      		  <input style="width: 500px; height: 35px; padding-left: 10px;" type="text" placeholder="Search" name="search">
	      		  <button style ="width:40px; height: 35px;" type="submit"><i class="fa fa-search"></i></button>
    		  </form>
  			</div>
		  </div>
		  <div class="collapse navbar-collapse">
		  	<?php if ($this->CookieModel->getCookie() == null) { ?>

		      	<div class="col-md-5"> </div>
			  	<a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url() ?>">Home</a>
			  	<a href="#">
			  		<img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:40px;">
			  	</a>
			  	<a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url('profil'); ?>">Username</a>

		    <?php } else { ?>

		      	<div class="col-md-3"> </div>
			  	<a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url() ?>">Home</a>
			  	<a href="#">
			  		<img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:40px;">
			  	</a>
			  	<a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url('profil'); ?>">Username</a>
			  	<a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url('upload_gambar'); ?>">Upload</a>

		    <?php } ?>
		  </div>
		  <div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		    </ul>
		      <?php if ($this->CookieModel->getCookie() == null) { ?>

		      	<button style="width: 80px; height: 35px; font-size: 18px;" class="btn btn-default" onclick="location.href='<?php echo site_url('login'); ?>'">Login</button>

		      <?php	} else { ?>

		      	<button style="width: 80px; height: 35px; font-size: 18px;" class="btn btn-default" onclick="location.href='<?php echo site_url('logout'); ?>'">Logout</button>

		      <?php	} ?>
		  </div>
	  </div>
	</nav>
	<!-- -->
    <div class="container">
        <div style="padding-top: 30px">
            <div class="outter-form-login" style="width:350px; padding-top: 50px; padding-bottom: 50px; box-shadow: 0px 0px 0px 0px; position: absolute;">
	            <div class="logo-login">
		            <center><img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:150px; height: 150px;"></center>           
		            <center><h4>@username</h4></center>
		            <center><h5>Real Name</h5></center>                        	
	           	</div>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="container">
        <div style="padding-left: 400px">
            <div class="outter-form-login" style="width:400px; padding-top: 30px; padding-bottom: 10px; box-shadow: 0px 0px 0px 0px; position: absolute;">
            	<div class="logo-login">
	                <form action="#" method="#">
	                	<h3>Profile Information</h3>
	                	<b>Username</b>
	                    <div class="form-group" style="width: 200px;">
	                        <input type="text" class="form-control" name="username" placeholder="Username" value="">
	                    </div>
	                	<b>Real Name</b>
	                    <div class="form-group" style="width: 200px;">
	                        <input type="text" class="form-control" name="realname" placeholder="Real Name">
	                    </div>
	                    <b>Gender</b>
	                    <div class="form-group">
	                        <input type="radio" name="gender" value="male" checked> Male<br>
	  						<input type="radio" name="gender" value="female"> Female<br>
	                    </div>
	                    <b>Address</b>
	                    <div class="form-group">
	                        <textarea name="komentar" placeholder="Address" style="width: 200px; height:100px"></textarea>
	                    </div>
	                </form>
            	</div>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="container">
        <div style="padding-left: 750px">
            <div class="outter-form-login" style="width:360px; padding-top: 30px; padding-bottom: 32px; box-shadow: 0px 0px 0px 0px; position: absolute;">
            	<div class="logo-login">
	                <form action="#" method="#">
	                	<h3>Account Information</h3>
	                	<b>New Password</b>
	                    <div class="form-group" style="width: 200px;">
	                        <input type="password" class="form-control" name="newpassword" placeholder="New Password" value="">
	                    </div>
	                	<b>Confirm New Password</b>
	                    <div class="form-group" style="width: 200px;">
	                        <input type="password" class="form-control" name="confirmnewpassword" placeholder="Confirm New Password">
	                    </div>
	                    <div style="padding-top: 165px; padding-left: 8em;">
	                    	<a href="#" class="next">Save changes</a>
	                    </div>
	                </form>
	            </div>
            </div>
        </div>
    </div>
    <div style="padding-top: 512px;">
    	<div class="footer" style="height: 70px;"><br>
            <center>Copyright ©2018 FreePicture</center> 
		</div>
    </div>
  </body>
</html>