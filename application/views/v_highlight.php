<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="<?php echo site_url('assets/css/bootswatch/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/bootswatch/style.css') ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/style2.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head

<style>

</style>

<body>
	<nav class="navbar navbar-expand-lg navbar-light navcolor" style="height: 50px;">
	  <div class="container">
		  <a class="navbar-brand" href="<?php echo site_url() ?>"><img height="35px" width="35px" src="<?php echo site_url('assets/img/WebsiteLogo2.png') ?>"></a>
		  <div class="topnav">
  			<div class="search-container">
    		  <form action="#">
      		  <input style="width: 500px; height: 35px;" type="text" placeholder="&nbsp;&nbsp;&nbsp;Search" name="search">
      		  <button style ="width:40px; height: 35px;" type="submit"><i class="fa fa-search"></i></button>
    		  </form>
  			</div>
		  </div>
		  <div class="collapse navbar-collapse">
		  	<div class="col-md-5"> </div>
		  	<a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url() ?>">Home</a>
		  	<a href="#">
		  		<img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:40px;">
		  	</a>
		  	<a class="navbar-nav mr-auto" style="color: white; " href="#">Username</a>
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
	
	<br>
	<br>
	
	  <div style="padding-left: 100px;">
	    <a href="<?php echo site_url() ?>" class="previous">&laquo; Back</a>
	  </div>
	  
	 <br>
	
    <div class="row grid-container" style="padding-left : 100px"> 
	
		<div class="col-sm-6">
	  
			<img style="width:550px;height:550px;" src="<?php echo site_url('upload/'.$highlight->nama_file); ?>" width="200" height="200">">
		
		</div>
	  
		<div class="col-sm-6">
	  
			<a style="color: black; padding-center:80px" align="center" href="#" >
	  
				<img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:40px;">
			Username
	  
			</a>
			
			<br>

			<div class="col-sm-6">
		
				Test
		
				<hr color="black">
		
			</div>
		
			<br>
			
			<div class="col-md-6">
			
			<b href="#">user_kece</b>   Apa komentarmu, boy ? <p>
			<b href="#">user_kece1</b>  Mahasiswa... ?
			
			<hr color="black">
		
			<a href="#" >
		
				<img src="https://image.flaticon.com/icons/png/512/66/66845.png" alt="Like" style="width:40px;">
			
			</a>
		
			<a href="#" >
		
				<img src="http://pngimages.net/sites/default/files/comment-png-image-68678.png" alt="Comment" style="width:40px;">
		
			</a>
		
			<br>
			
				<p align="right"><?php echo $highlight->jumlah_view; ?> Views</p>
			
			<br>
		
			<form action="/action_page.php">
		        	<textarea name="komentar" placeholder="komentar" style="width: 275px; height:100px"></textarea>
		        	<button type="submit" class="btn btn-default">Submit</button>
			</form>
			</div>
		
		</div>
	  
	  <br>
	  
	</div>
	
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