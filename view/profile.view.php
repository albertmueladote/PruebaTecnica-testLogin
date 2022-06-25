<!DOCTYPE html>
<html> 
  <head>
      <title>Perfil</title>
      <?php include(BLOCK . 'header.block.php'); ?> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo CSS . 'profile.css'?>">
      <link rel="stylesheet" href="<?php echo CSS . 'style.css'?>">
  </head>
  <body>
    <div class="container-fluid"> 
      <div class="rows">
        <!-- Add icon library -->
        <div class="card">
          <img src="<?php echo IMG . $current_user->image; ?>" alt="John" style="width:100%">
          <h1><?php echo $current_user->name; ?></h1>
          <p class="title"><?php echo $current_user->job; ?></p>
          <p><?php echo $current_user->origin; ?></p>
          <?php foreach(json_decode($current_user->social) AS $social){ ?>
            <a href="<?php echo $social->href; ?>" target="_blank"><i class="<?php echo $social->icon; ?>"></i></a>
          <?php }?>
          <p><button id="logout">Desconectar</button></p>
          <div class="error"></div>
        </div>
      </div> 
    </div>
    <?php include(BLOCK . 'footer.block.php'); ?>
    <script src="<?php echo JS . 'profile.js'?>"></script>
  </body>
</html>
