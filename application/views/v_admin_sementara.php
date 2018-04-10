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
	<nav class="navbar navbar-expand-lg navbar-light navcolor" style="height: 60px;">
	  <div class="container">
		  <a class="navbar-brand" href="<?php echo site_url('admin') ?>"><img height="40px" width="40px" src="<?php echo site_url('assets/img/WebsiteLogo2.png') ?>"></a>
		  <a class="navbar-brand" style="color: white; " href="<?php echo site_url('admin') ?>">FreePicture - Admin</a>

		  <div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		    </ul>
		      <button style="width: 100px; font-size: 18px;" class="btn btn-default" onclick="location.href='<?php echo site_url('logout'); ?>'">Logout</button>
		  </div>
	  </div>
	</nav>
	<div class="container">
		<h2>Data User</h2>
		<table class="table table-hover">
			<thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Email</th>
		      <th scope="col">Username</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($data as $key) { ?>
		  	  <tr>
		  	  	<td><?php echo $key['id']; ?></td>
		  	  	<td><?php echo $key['email']; ?></td>
		  	  	<td><?php echo $key['username']; ?></td>
		  	  	<td><a href="<?php echo site_url('admin/hapus_user'); ?>" class="btn btn-danger">HAPUS USER</a></td>
		  	  </tr>	
		  	<?php } ?>
		  </tbody>
		</table>
	</div>
</body>
</html>