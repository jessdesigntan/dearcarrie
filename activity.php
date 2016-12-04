<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Add Post"); ?>

  <body>
    <?= navbar(); ?>
    <div class="page-container">
      <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
              <div class="content-title">
                  <h4>Activity</h4>
              </div>
              <div class="media">
                  <div class="media-left">
                      <a href="profile">
                          <img class="media-object" src="images/default.svg">
                      </a>
                  </div>
                  <div class="media-body">
                      <a href="profile" class="primary-color">Jess Tan</a> is following you now
                      <div class="new pull-right primary-color">&bull;</div>
                  </div>

                  <div class="media-right">
                      <p class="small light-text">10 Days</p>
                  </div>
              </div>
              <div class="media active">
                  <div class="media-left">
                      <a href="profile">
                          <img class="media-object" src="images/default.svg">
                      </a>
                  </div>
                  <div class="media-body">
                      <a href="profile" class="primary-color">Jess Tan</a> is following you now
                      <div class="new pull-right primary-color">&bull;</div>
                  </div>

                  <div class="media-right">
                      <p class="small light-text">10 Days</p>
                  </div>
              </div>
          </div><!-- END left column col-sm-8 -->
      </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
  </body>
</html>
