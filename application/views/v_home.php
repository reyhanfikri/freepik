<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="<?php echo site_url('assets/css/bootswatch/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/bootswatch/style.css') ?>" rel="stylesheet">
    <link href="assets/css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light navcolor" style="height: 50px;">
	  <div class="container">
		  <a class="navbar-brand" href="<?php echo site_url('admin') ?>"><img height="35px" width="35px" src="<?php echo site_url('assets/img/WebsiteLogo2.png') ?>"></a>
		  <div class="topnav">
  			<div class="search-container">
    		  <form action="#">
      		  <input style="width: 500px; height: 35px;" type="text" placeholder="Search" name="search">
      		  <button style ="width:40px; height: 35px;" type="submit"><i class="fa fa-search"></i></button>
    		  </form>
  			</div>
		  </div>
		  <div class="collapse navbar-collapse">
		  	<div class="col-md-5"> </div>
		  	<a class="navbar-nav mr-auto" style="color: white; " href="#">Home</a>
		  	<a href="#">
		  		<img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:40px;">
		  	</a>
		  	<a class="navbar-nav mr-auto" style="color: white; " href="#">Username</a>
		  </div>
		  <div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		    </ul>
		      <button style="width: 80px; height: 35px; font-size: 18px;" class="btn btn-default" onclick="location.href='<?php echo site_url('logout'); ?>'">Logout</button>
		  </div>
	  </div>
	</nav>
	<br>
	<br>
    <div class="row" style="padding-top: 10px; padding-center: 120px;"> 
	
    	<?php foreach ($semua_gambar as $value) { ?>
    		<div class="column">
			    <a href="<?php echo site_url('highlight/'.$value->nama_file); ?>"><img src="<?php echo site_url('upload/'.$value->nama_file); ?>" width="200" height="200"></a>
			</div>
		<?php } ?>
	  
	  <br>
	  <br>
	  <p>
	  <p>
	  
	</div>
	<br>

	<div class="row">
		<div class="col-md-6" align="left">
		  <a href="#" class="previous">&laquo; Previous</a>
		</div>

		<div class="col-md-5" align="right">
		  <a href="#" class="next">Next &nbsp &raquo;</a>
		</div>
	</div>
	<br>
	<br>
	  
	<div class="footer">
	
        <ul>
        <li style="color:#4286f4">
            <a style="color: white;" href="#">About</a>
        </li>
        <li style="color:#4286f4">
            <a style="color: white;" href="#">Contact</a>
        </li>
        <li style="color:#4286f4">
            <a style="color: white;" href="#">Bla</a>
        </li>
        <li style="color:#4286f4">
            <a style="color: white;" href="#">Bla</a>
        </li>
        <li style="color:#4286f4">
            <a style="color: white;" href="#">Bla</a>
        </li>
        <li style="color:#4286f4">
            <a style="color: white;" href="#">Copyright ©2018 FreePicture</a>
        </li>
        </ul>
             
	</div>
</body>
</html>