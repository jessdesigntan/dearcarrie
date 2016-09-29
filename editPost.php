<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Edit Post"); ?>

  <body>
    <?= navbar(); ?>

    <div class="page-container wow fadeInUp">
      <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <div class="content-title">
                <h4>Edit Post</h4>
            </div>
              <form class="addPost">
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="Title">
                      <hr/>
                  </div>
                  <div class="form-group">
                      <textarea placeholder="Share your story ..." onkeyup="auto_grow200(this)"></textarea>
                      <button class="primary-line-btn float-right" type="submit">Update</button>
                      <button class="secondary-line-btn" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                  </div>
              </form>
          </div><!-- END left column col-sm-8 -->

      </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
  </body>
</html>
