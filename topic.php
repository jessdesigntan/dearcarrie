<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("All Topics"); ?>

  <body>
    <?= navbar(); ?>
    <div class="page-container">
      <h3 class="hero-center">Featured Topics</h3>
      <div class="row">
          <div class="col-sm-6">
              <div class="featured-topics">
                  <a href="topicDetails">
                      <img src="images/love.jpg" class="img-responsive">
                      <div class="text">
                          <h3>Love & Relationships</h3>
                          <p>10.4K Posts</p>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="featured-topics">
                  <a href="topicDetails">
                      <img src="images/love.jpg" class="img-responsive">
                      <div class="text">
                          <h3>Love & Relationships</h3>
                          <p>10.4K Posts</p>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="featured-topics">
                  <a href="topicDetails">
                      <img src="images/love.jpg" class="img-responsive">
                      <div class="text">
                          <h3>Love & Relationships</h3>
                          <p>10.4K Posts</p>
                      </div>
                  </a>
              </div>
          </div>
      </div>

      <h3 class="hero-center">Curated Topics</h3>
      <div class="row">
          <?php for ($i=0; $i<10; $i++) { ?>
            <div class="col-sm-12">
              <?= topicCard(); ?>
            </div><!-- END col-sm-12 -->
          <?php } ?>
      </div>
    </div><!-- END page-container -->


    <?= footer(); ?>
  </body>
</html>
