<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("User Profile"); ?>

  <body>
    <?= navbar(); ?>
    <div class="page-container wow fadeInUp">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <div class="user-header">
            <div class="header">
              <div>
                <h2>Jess Tan</h2>
                <p>Writing my way through it.</p>
              </div>
              <div>
                <img src="images/avatar.png">
              </div>
            </div>
            <div class="details">
              <p><span class="weight-500">24</span> Posts</p>
              <a href="#" data-toggle="modal" data-target="#topicsModal">Following <span class="weight-500">5</span> Topics</a>
            </div>
          </div>

          <div class="content-title">
            <h4>Your Posts</h4>
          </div>
          <?php for ($i=1; $i<=12; $i++) {
            card();
          }
          ?>
        </div>
      </div><!-- ./row -->

      <div class="modal fade" id="topicsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Topics you follow</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                  <?php for ($i=0; $i<10; $i++) { ?>
                    <div class="col-sm-12">
                      <?= topicCard(); ?>
                    </div><!-- END col-sm-12 -->
                  <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?= footer(); ?>
  </body>

</html>
