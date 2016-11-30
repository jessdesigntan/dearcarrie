<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $userID = $_GET["userID"];
  $user = getUserByID($userID);
?>

<html lang="en">
  <?php head("Your Profile"); ?>

  <body>
    <?= navbar(); ?>
    <div class="page-container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <div class="user-header">
            <div class="header">
              <div>
                <h2><?=$user["name"];?></h2>
                <p><?=$user["description"];?></p>
              </div>
              <div>
                <img src="<?=$user["image"];?>">
              </div>
            </div>
            <div class="details">
              <p><span class="weight-500"><?=countPostByUserID($userID);?></span> Posts</p>
              <a href="#" data-toggle="modal" data-target="#topicsModal">Following <span class="weight-500">5</span> Topics</a>
            </div>
          </div>

          <div class="content-title">
            <?php if ($_SESSION["userid"] == $userID) {?>
              <h4>Your Posts</h4>
            <?php } else { ?>
              <h4><?=$user["name"];?>'s Posts</h4>
            <?php } ?>
          </div>
          <?php
            $posts = displayAllPostByUserID($userID);

            if (count($posts) == 0) {
          ?>
              <div class="post-empty-state">
                  <div>
                      <h4>No posts yet</h4>
                      <a class="primary-line-btn" href="addPost">Write something</a>
                  </div>
              </div>
          <?php
            }
            else {
              foreach ($posts as $post) {
                card($post["id"]);
              }
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
