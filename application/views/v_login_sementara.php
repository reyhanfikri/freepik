<!DOCTYPE html>
<html>
<head>
	<title>Login Percobaan</title>
</head>
<body>
	<form action="<?php echo base_url()."login_sementara"; ?>" method="post">
		<?php
			echo $error1; 
			if ($error1 != ""){
				echo "<br>";
			}
		?>
		Username: <input type="text" name="username" value="<?php echo $username; ?>"><br><br>
		<?php 
			echo $error2;
			if ($error2 != ""){
				echo "<br>";
			}
		?>
		Password: <input type="password" name="password"><br><br>
		<input type="submit" name="submit"><br>
	</form>
</body>
</html>