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
                <h4>Share Something</h4>
            </div>
              <form class="addPost">
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="Title">
                      <hr/>
                  </div>
                  <div class="form-group">
                      <textarea placeholder="Share your story ..." onkeyup="auto_grow200(this)"></textarea>
                      <button class="primary-line-btn" type="submit">Submit</button>
                  </div>
              </form>
          </div><!-- END left column col-sm-8 -->

      </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
  </body>
</html>
