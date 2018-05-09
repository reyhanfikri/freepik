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
	  
	<div style="padding-top: 98px;">
    	<div class="footer" style="height: 70px;"><br>
            <center>Copyright ©2018 FreePicture</center> 
		</div>
    </div>
</body>
</html>