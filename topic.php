<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("All Topics"); ?>

  <body>
    <?= navbar(); ?>

    <div class="page-container wow fadeInUp">
      <div class="row">
          <?php for ($i=0; $i<10; $i++) { ?>
            <div class="col-sm-12">
              <?= topicCard(); ?>
            </div><!-- END col-sm-12 -->
          <?php } ?>
      </div>
    </div><!-- END page-container -->

    <footer class="footer">
      <div class="page-container">
        <p class="text-muted">This is the footer</p>
      </div>
    </footer>
  </body>
</html>
