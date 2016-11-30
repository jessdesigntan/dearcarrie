<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $postID = $_GET["postID"];
  $post = getPostByID($postID);

  //check if postID belongs to the users
  goBackIfNotEqual($_SESSION["userid"], $post["userid"]);
?>

<html lang="en">
  <?php head("Edit Post"); ?>

  <body>
    <?= navbar(); ?>

    <div class="page-container">
      <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
              <div class="content-title">
                  <h4>Edit Post</h4>
              </div>
              <div class="alert alert-danger alert-dismissable fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p id="errorMsg">Please fill up everything</p>
              </div>
              <form class="addPost" action="editPostProcess" method="post" name="postForm" id="postForm">
                  <div class="form-group">
                      <input type="hidden" name="postID" value="<?=$postID;?>">
                      <input type="text" class="form-control" value="<?=$post["title"];?>" name="title" placeholder="Title">
                      <hr/>
                  </div>
                  <div class="form-group">
                      <textarea onkeyup="auto_grow200(this)" name="desc" placeholder="Write your story here . . "><?=$post["description"];?></textarea>
                      <button name="action" value="update" class="primary-line-btn float-right" type="submit">Update</button>
                      <button name="action" value="delete" class="secondary-line-btn" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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
      var title = (document.forms["postForm"]["title"].value).trim();
      var desc = (document.forms["postForm"]["desc"].value).trim();
      var validation = true;
      //validations
      if (title.length == 0 || desc.length == 0) {
        validation = false;
      }

      if (!validation) {
        $(".alert").show();
      }

      return validation;
    });
  </script>
</html>
