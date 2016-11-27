<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Topic Details"); ?>

  <body>
    <?= scrollTopBtn(); ?>
    <?= navbar(); ?>

    <div class="page-container wow fadeInUp">
      <div class="topic-header">
        <div>
          <img src="images/love.jpg" class="img-responsive">
          <div class="text">
              <h1>Love & Relationship</h1>
              <p class="lead">Keep Learning. Keep Growing.</p>
              <a class="white-line-btn">Follow Topic</a>
          </div>
        </div>
      </div>

      <div class="row">
          <div class="col-sm-9">
            <div class="content-title">
              <h4>Top Stories For You</h4>
            </div>
            <?php for ($i=1; $i<=10; $i++) {
              card();
            }
            ?>
          </div><!-- END left column col-sm-8 -->
          <div class="col-sm-3">
            <div class="main-sidebar">
              <?= topicSideContent(); ?>
            </div>
            <script>staticBar('.main-sidebar','454')</script>
          </div><!-- END right column col-sm-4 -->

      </div>
    </div><!-- END page-container -->


    <?= footer(); ?>
  </body>
</html>
