<!DOCTYPE html>
<html>
<head>
	<title>Register Percobaan</title>
</head>
<body>
	<?php 
		if ($register == ""){
	?>
	<form action="<?php echo base_url()."register_sementara"; ?>" method="post">
		<?php
			echo $error3; 
			if ($error3 != ""){
				echo "<br>";
			}
		?>
		Email: <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
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
	<?php
		}else {
			echo $register;
	?>
		<button onclick="location.href='<?php echo base_url()."login_sementara"; ?>'">Login</button>
	<?php
		}
	?>
</body>
</html>