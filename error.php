<?php

$msg = $_GET["msg"];
include('controllers/templates.php');
?>

<html lang="en">
  <?php head("Something went wrong..."); ?>

  <body>
    <div class="loader"></div>
    <div class="page-container" style="text-align:center;">
      <?= navbar(); ?>
      <h1 style="font-size:5em; color:#eee;"><?=$msg;?></h1>
      <h3 class="mBottom-40">Hmm, I think something went wrong</h3>
      <a href="/fyp" class="primary-line-btn">Go back to home</a>
    </div>
  </body>
</html>
