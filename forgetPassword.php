<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<?php
  $errorMsg = $_GET["msg"];

?>

<html lang="en">
  <?php head("Dear Carrie - Forget Password"); ?>

  <body>
    <?= navbar(); ?>

    <?php if (isset($_SESSION['FBID'])):  header("Location: /fyp");?>      <!--  After user login  -->

    <?php else: ?>     <!-- Before login -->
    <div class="page-container">
        <div class="small-wrapper">
          <img src="images/logo-long.svg" class="logo">
          <div class="title">Forget Password</div>
          <?php
              if(!ifEmpty($errorMsg)) {
                  infoAlert($errorMsg);
              }
          ?>
          <form action="forgetProcess" method="post">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <button type="submit" class="primary-line-btn">Submit</button>
          </form>
        </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
    <?php endif ?>
  </body>
</html>
