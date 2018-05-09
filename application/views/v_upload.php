  <br>
  <br>
  
    <div class="container" style="padding-left: 100px;">
      <a href="<?php echo site_url(); ?>" class="previous">&laquo; Back</a>
    </div>
    
   <br>
  
    <div class="container" style="padding-left: 200px; padding-right: 600px;">
      <?php
        if ($upload_success_or_failed == "Upload gagal!"){ ?>
          <div class="alert alert-warning" role="alert">
            <?php
              echo $upload_success_or_failed; 
              echo "<br>";
            ?>
          </div>
        <?php } else if ($upload_success_or_failed == "Upload sukses!"){ ?>
          <div class="alert alert-success" role="alert">
            <?php
              echo $upload_success_or_failed; 
              echo "<br>";
            ?>
          </div>
      <?php } ?>

      <?php echo form_open_multipart('upload_gambar') ?>
        <input type="file"  name="userfile" style="background-color: #4286f4; color:WHITE;"><br><br>
        <br><div style="padding-left: 100px;">
          <input type="submit" value="Upload" name="submit">
        </div>
      </form>
    </div>
    <br>

  <div style="padding-top: 316px;">
      <div class="footer" style="height: 70px;"><br>
            <center>Copyright ©2018 FreePicture</center> 
    </div>
    </div>
</body>
</html>