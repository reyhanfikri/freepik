<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FreePicture</title>
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
        <?php if ($this->CookieModel->getCookie() == null) { ?>

            <div class="col-md-5"> </div>
          <a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url() ?>">Home</a>
          <a href="#">
            <img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:40px;">
          </a>
          <a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url('profil'); ?>">Username</a>

        <?php } else { ?>

            <div class="col-md-3"> </div>
          <a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url() ?>">Home</a>
          <a href="#">
            <img src="https://cdn.iconscout.com/public/images/icon/premium/png-512/account-avatar-male-man-person-profile-363ed8899dda8c42-512x512.png" alt="Username" style="width:40px;">
          </a>
          <a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url('profil'); ?>">Username</a>
          <a class="navbar-nav mr-auto" style="color: white; " href="<?php echo site_url('upload_gambar'); ?>">Upload</a>

        <?php } ?>
      </div>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
        </ul>
          <?php if ($this->CookieModel->getCookie() == null) { ?>

            <button style="width: 80px; height: 35px; font-size: 18px;" class="btn btn-default" onclick="location.href='<?php echo site_url('login'); ?>'">Login</button>

          <?php } else { ?>

            <button style="width: 80px; height: 35px; font-size: 18px;" class="btn btn-default" onclick="location.href='<?php echo site_url('logout'); ?>'">Logout</button>

          <?php } ?>
      </div>
    </div>
  </nav>
  
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

  <div class="footer">
        <ul>
        <li style="color:#4286f4">
            <a style="color: white;" href="#">About</a>
        </li>
        <li style="color:#4286f4">
            <a style="color: white;" href="#">Contact</a>
        </li>
        <li style="color:#4286f4">
            <a style="color: white;" href="#">Copyright ©2018 FreePicture</a>
        </li>
        </ul>
             
  </div>
</body>
</html>