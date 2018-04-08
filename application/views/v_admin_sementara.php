<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreePicture - ADMIN</title>

    <link href="<?php echo site_url('assets/css/bootswatch/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/bootswatch/style.css') ?>" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light navcolor">
	  <div class="container">
		  <a class="navbar-brand" href="<?php echo site_url('admin') ?>"><img height="40px" width="40px" src="<?php echo site_url('assets/img/WebsiteLogo2.png') ?>"></a>
		  <a class="navbar-brand" href="<?php echo site_url('admin') ?>">FreePicture - Admin</a>

		  <div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		    </ul>
		      <button style="width: 100px; font-size: 18px;" class="btn btn-default" onclick="location.href='<?php echo site_url('logout'); ?>'">Logout</button>
		  </div>
	  </div>
	</nav>
</body>
</html>