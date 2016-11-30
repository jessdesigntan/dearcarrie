<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<html lang="en">
  <?php head("Dear Carrie"); ?>

  <body>
    <?= navbar(); ?>

    <div class="page-container">
      <div class="main-banner-grid row">
          <div class="col-sm-8 col-xs-12">
              <a href="topicDetails"><img src="images/split.jpg" class="img-responsive"></a>
          </div>
          <div class="col-sm-4 col-xs-12">
              <a href="topicDetails"><img src="images/stress.jpg" class="img-responsive"></a>
          </div>
          <div class="col-sm-4 col-xs-12">
              <a href="topicDetails"><img src="images/suicide.jpg" class="img-responsive"></a>
          </div>
      </div>
      <br/><br/>

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
            <?= mainSideContent(); ?>
          </div><!-- END right column col-sm-4 -->

      </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
  </body>
</html>
