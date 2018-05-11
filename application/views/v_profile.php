	<!-- -->
    <div class="container">
        <div style="padding-top: 30px; padding-left: 100px;">
            <div class="outter-form-login" style="width:350px; padding-top: 50px; padding-bottom: 50px; box-shadow: 0px 0px 0px 0px; position: absolute;">
	            <div class="logo-login">
		            <center><img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:150px; height: 150px;"></center>           
		            <center><h4>@<?php echo $user_data->username; ?></h4></center>
		            <center><h5><?php 
		            	if ($user_profile_data->nama_lengkap !== null) {
		            		
		            		echo $user_profile_data->nama_lengkap;

		            	} else {

		            		echo "";

		            	}
		            ?></h5></center>                        	
	           	</div>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="container">
        <div style="padding-left: 500px">
            <div class="outter-form-login" style="width:400px; padding-top: 20px; padding-bottom: 10px; position: absolute;">
            	<div class="logo-login">
	                <form action="#" method="#">
	                	<h3>Profile Information</h3>
	                	<b>Username</b>
	                    <div class="form-group" style="width: 270px;">
	                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user_data->username; ?>">
	                    </div>
	                	<b>Nama Lengkap</b>
	                    <div class="form-group" style="width: 270px;">
	                        <input type="text" class="form-control" name="realname" placeholder="Nama Lengkap" value="<?php 
	                        	if ($user_profile_data->nama_lengkap !== null) {
		            		
				            		echo $user_profile_data->nama_lengkap;

				            	} else {

				            		echo "";

				            	}
	                         ?>">
	                    </div>
	                    <b>Jenis Kelamin</b>
	                    <?php 
	                        if ($user_profile_data->jenis_kelamin !== null) { 
	                        	if ($user_profile_data->jenis_kelamin == "Laki-laki") { ?>
				            	<div class="form-group">
			                        <input type="radio" name="gender" value="Laki-laki" checked> Laki-laki<br>
			  						<input type="radio" name="gender" value="Perempuan"> Perempuan<br>
			                    </div>
				        <?php   } else if ($user_profile_data->jenis_kelamin == "Perempuan") { ?>
				        		<div class="form-group">
			                        <input type="radio" name="gender" value="Laki-laki"> Laki-laki<br>
			  						<input type="radio" name="gender" value="Perempuan" checked> Perempuan<br>
			                    </div>
			            <?php 	}   
			        		} else { ?>
				            	<div class="form-group">
			                        <input type="radio" name="gender" value="Laki-laki"> Laki-laki<br>
			  						<input type="radio" name="gender" value="Perempuan"> Perempuan<br>
			                    </div>
				        <?php } ?>
	                    <b>Alamat</b>
	                    <div class="form-group">
	                        <textarea name="address" placeholder="Alamat" style="width: 270px; height:100px"></textarea>
	                    </div>
	                    <div style="padding-left: 10em;">
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