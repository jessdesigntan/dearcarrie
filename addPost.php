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
              <div class="alert alert-danger alert-dismissable fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p id="errorMsg">Please fill up everything</p>
              </div>
              <form class="addPost" action="addPostProcess" method="post" name="postForm" id="postForm">
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="Title" name="title">
                      <hr/>
                  </div>
                  <div class="form-group">
                      <textarea placeholder="Share your story ..." onkeyup="auto_grow200(this)" name="desc"></textarea>
                      <button class="primary-line-btn" type="submit">Submit</button>
                  </div>
              </form>
          </div><!-- END left column col-sm-8 -->
      </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
  </body>
  <script>
    $(".alert").hide();

    $('#postForm').submit(function() {
      //set variables

      var title = document.forms["postForm"]["title"].value;
      var desc = (document.forms["postForm"]["desc"].value).trim();
      var validation = true;

      //validations
      if (title == null || title == "") {
        validation = false;
      }

      if (desc == null || desc == "") {
        validation = false;
      }

      if (!validation) {
        $(".alert").show();
      }

      return validation;
    });
  </script>
</html>
