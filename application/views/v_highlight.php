	<br>
	<br>
	
	  <div style="padding-left: 100px;">
	    <a href="<?php echo site_url() ?>" class="previous">&laquo; Back</a>
	  </div>
	  
	 <br>
	
    <div class="row grid-container" style="padding-left : 100px"> 
	
		<div class="col-sm-6">
	  
			<img style="width:550px;height:550px;" src="<?php echo site_url('upload/'.$highlight->nama_file); ?>" width="200" height="200">
		
		</div>
	  
		<div class="col-sm-6">
	  
			<p style="color: black; padding-left: 10px;">
	  
				<img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:40px;">
			<?php echo $user->username; ?>
	  
			</p>
			
			<br>

			<div class="col-sm-6">
		
				<?php echo $highlight->nama_gambar; ?>
		
				<hr color="black">
		
			</div>
		
			<br>
			
			<div class="col-md-6">

			<?php foreach ($semua_komentar as $value) { ?>
				<b><?php echo $value->username; ?></b> <?php echo $value->comment; ?><br>
			<?php } ?>
			
			<hr color="black">
		
			<a href="<?php echo site_url('likeGambar/'.$highlight->nama_file.'/'.$highlight->jumlah_like); ?>" >
		
				<img src="https://image.flaticon.com/icons/png/512/66/66845.png" alt="Like" style="width:40px;">
			
			</a>
		
			<a href="#" >
		
				<img src="http://pngimages.net/sites/default/files/comment-png-image-68678.png" alt="Comment" style="width:40px;">
		
			</a>

			<a href="<?php echo site_url('upload/'.$highlight->nama_file); ?>" download>
		
				<img src="https://image.flaticon.com/icons/svg/69/69656.svg" alt="Download" style="width:40px;">
		
			</a>
		
			<br>
				<p align="left"><?php echo $highlight->jumlah_like; ?> Likes</p>
				<p align="right"><?php echo $highlight->jumlah_view; ?> Views</p>
			
			<br>
		
			<form action="<?php echo site_url('home/highlight/'.$highlight->nama_file); ?>" method="post">
		        	<textarea name="komentar" placeholder="komentar" style="width: 275px; height:100px"></textarea>
		        	<button type="submit" class="btn btn-default" name="submitcomment">Submit</button>
			</form>
			</div>
		
		</div>
	  
	  <br>
	  
	</div>
	
	<br>
	
	<div style="padding-top: 50px;">
    	<div class="footer" style="height: 70px;"><br>
            <center>Copyright ©2018 FreePicture</center> 
		</div>
    </div>
</body>
</html>