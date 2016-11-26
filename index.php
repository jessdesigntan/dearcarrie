<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Dear Carrie"); ?>

  <body>
    <?= navbar(); ?>

    <div class="page-container wow fadeInUp">
      <div class="row">
          <div class="col-sm-9">
            <div class="content-title">
              <h4>Top Stories For You</h4>
            </div>
            <?php for ($i=1; $i<=12; $i++) {
              if ($i % 4 == 0) { //for every 3 full row, split into 2
              ?>
                <div class="row">
                    <div class="col-sm-6">
                      <?= suggestedCard(); ?>
                    </div>
                    <div class="col-sm-6">
                      <?= suggestedCard(); ?>
                    </div>
                </div>
              <?php
              }
              else {
                card();
              }
            }
            ?>
          </div><!-- END left column col-sm-8 -->
          <div class="col-sm-3">
            <div class="main-sidebar">
              <?= mainSideContent(); ?>
            </div>
            <script>staticBar('.main-sidebar','10')</script>
          </div><!-- END right column col-sm-4 -->

      </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
  </body>
</html>
