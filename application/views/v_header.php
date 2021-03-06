<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FreePicture</title>
	<link href="<?php echo site_url('assets/css/bootswatch/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/bootswatch/style.css') ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/style2.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
			  	<a href="<?php echo site_url('profil'); ?>">
			  		<img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:40px;">
			  	</a>
			  	<a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url('profil'); ?>">
			  		Username
			  	</a>

		    <?php } else { ?>

		      	<div class="col-md-3"> </div>
			  	<a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url() ?>">Home</a>
			  	<a href="<?php echo site_url('profil'); ?>">
			  		<img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:40px;">
			  	</a>
			  	<a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url('profil'); ?>"><?php echo $this->CookieModel->getCookie(); ?></a>
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