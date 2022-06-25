<!DOCTYPE html>
<html> 
  <head>
      <title>Login</title>
      <?php include(BLOCK . 'header.block.php'); ?>
      <link rel="stylesheet" href="<?php echo CSS . 'form.css'?>">
      <link rel="stylesheet" href="<?php echo CSS . 'style.css'?>">
  </head>
  <body>
    <div class="container-fluid"> 
      <div class="rows">
        <div class="login">
          <h1>Login</h1>
            <form id="frmLogin">
                <input type="email" name="email" placeholder="Usuario" required="required" value="albertmueladote@gmail.com"/>
                <input type="password" name="password" placeholder="Contaseña" required="required" value="12345678" />
                <button type="submit" class="btn btn-primary btn-block btn-large">Entrar</button>
                <div class="error"></div>
            </form>
        </div>
      </div> 
    </div>
    <?php include(BLOCK . 'footer.block.php'); ?>
    <script src="<?php echo JS . 'login.js'?>"></script>
  </body>
</html>

