<?php
include('controllers/templates.php');
?>

<html lang="en">
  <?php head("Page not found - 404"); ?>

  <body>
    <div class="loader"></div>
    <div class="page-container" style="text-align:center;">
      <?= navbar(); ?>
      <h1 style="font-size:10em; color:#eee;">404</h1>
      <h3 class="mBottom-40">Oops! The page you are looking for is not here!</h3>
      <a href="/fyp" class="primary-line-btn" type="submit" id="commentsDiv">Go back to home</a>
    </div>
  </body>
</html>
