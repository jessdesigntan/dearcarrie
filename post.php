<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $postID = $_GET["postID"];
  $post = getPostByID($postID);
  $comments = getAllCommentsByPostID($postID);
?>
<html lang="en">
  <?php head($post["title"], $post["title"]); ?>

  <body>
    <?= scrollTopBtn(); ?>
    <?= navbar(); ?>
    <div class="page-container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <?= cardExpand($post["id"]); ?>
              <h4>Responses</h4>
              <?php if ($_SESSION["userid"] != "") { ?>
                  <form action="addCommentProcess" method="post" class="comment-box">
                      <input type="hidden" name="postid" value="<?=$postID;?>">
                      <textarea name="comment" placeholder="Write a comment..." onkeyup="auto_grow(this)"></textarea>
                      <button class="primary-line-btn" type="submit" id="commentsDiv">Submit</button>
                  </form>
                  <hr/>
                  <?php
                    foreach ($comments as $comment) {
                      commentCard($comment["id"]);
                    }
                  ?>
              <?php } else { ?>
                  <div class="post-empty-state">
                      <div>
                          <h4>Sign up to start commenting</h4>
                          <a class="primary-line-btn" href="signup">Sign up</a>
                      </div>
                  </div>
              <?php } ?>
        </div><!-- END right column col-sm-8 -->

      </div>
    </div><!-- END page-container -->

    <?php suggestedReading(); ?>

    <?= footer(); ?>
  </body>

  <script>
  var followBtn = "Follow Post";
  var unfollowBtn = "Following";

  function followPost(userid, postid) {
      if (followBtn == "Following") {
          unfollowPost(userid, postid);
          return;
      }
      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              followBtn = this.responseText;
              unfollowBtn = this.responseText;
              $('#followBtn1').val(this.responseText);
              $('#unfollowBtn1').val(this.responseText);
          }
      };
      xmlhttp.open("GET","followPosts?userid="+userid+"&postid="+postid,true);
      xmlhttp.send();
  }

  function unfollowPost(userid, postid) {
      if (unfollowBtn == "Follow Post") {
          followPost(userid, postid);
          return;
      }
      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              followBtn = this.responseText;
              unfollowBtn = this.responseText;
              $('#followBtn1').val(this.responseText);
              $('#unfollowBtn1').val(this.responseText);
          }
      };
      xmlhttp.open("GET","unfollowPosts?userid="+userid+"&postid="+postid,true);
      xmlhttp.send();
  }
  </script>
</html>
