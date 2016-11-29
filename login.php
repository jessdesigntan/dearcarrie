<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Dear Carrie - Login"); ?>

  <body>
    <?= navbar(); ?>

    <div class="page-container">
        <div class="small-wrapper">
          <img src="images/logo-long.svg" class="logo">
          <div class="title">Welcome back</div>
          
          <form action="loginProcess" method="post">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
              </div>
              <button type="submit" class="primary-line-btn">Login</button>
          </form>
          <hr/>
          <a class="facebook-btn">
              <img src="images/facebookIcon.png" width="10"/>
              <div class="text">Login with Facebook</div>
          </a>
          <hr/>
          <a href="signup" class="primary-color"><center>No account yet? Sign up here.</center></a>
        </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
  </body>
</html>
