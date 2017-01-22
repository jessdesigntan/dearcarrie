<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $postID = $_GET["postID"];
  $post = getPostByID($postID);
  $comments = getAllCommentsByPostID($postID);
  $suggestedPosts = suggestedPost();
  $commentCount = countCommentsByPostID($postID);
?>
<html lang="en">
  <?php head($post["title"], $post["title"]); ?>

  <body>
    <?= scrollTopBtn(); ?>
    <?= navbar(); ?>
    <div class="page-container">
      <div class="fixed-share-sidebar">
          <h4>Share</h4>
          <ul>
              <li><a href="#"><img src="images/facebook.svg"></a></li>
              <li><a href="#"><img src="images/twitter.svg"></a></li>
          </ul>
      </div>
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <?= cardExpand($post["id"]); ?>
              <h4><?php if ($commentCount != 0) { echo $commentCount; } ?> Responses</h4>
              <?php if(isset($_SESSION["userid"])){
                if ($_SESSION["userid"] != "") { ?>
                  <form action="addCommentProcess" method="post" class="comment-box">
                      <input type="hidden" name="postid" value="<?=$postID;?>">
                      <textarea name="comment" placeholder="Write a comment..." onkeyup="auto_grow(this)" required></textarea>
                      <button class="primary-line-btn" type="submit" id="commentsDiv">Submit</button>
                  </form>
                  <hr/>
              <?php } } else { ?>
                <div class="post-empty-state mBottom-20">
                    <div>
                        <h4>Sign up to start commenting</h4>
                        <a class="primary-line-btn" href="signup">Sign up</a>
                    </div>
                </div>
              <?php } ?>
              <?php
                foreach ($comments as $comment) {
                  commentCard($comment["id"]);
                }
              ?>
        </div><!-- END right column col-sm-8 -->

      </div>
    </div><!-- END page-container -->

    <div class="suggested-container">
        <div class="page-container">
            <h4 class="hero-center">Suggested For You</h4>
            <div class="row">
                <?php foreach($suggestedPosts as $posts) { ?>
                <div class="col-sm-4">
                    <?php suggestedCard($posts["id"]); ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?= footer(); ?>
  </body>


  <script src="js/followPost.js"></script>
</html>
