<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $userID = $_GET["userID"];
  $user = getUserByID($userID);
  $followingUser = isFollowingUser($_SESSION["userid"], $user["id"]);
  $topics = getTopicsFollowedByUserID($userID);
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
                <p><?=countPostByUserID($userID);?> Posts</p>
                <p><?=countFollowersByUserID($userID);?> Followers</p>
                <a href="#" data-toggle="modal" data-target="#topicsModal">Following <?=countTopicsFollowedByUserID($userID);?> Topics</a>
            </div>
            <div class="button">
                <?php
                  if (!checkLogin() && $_SESSION["userid"] != $user["id"]) {
                    if ($followingUser) { //user following topic
                ?>
                      <form>
                        <input onclick="unfollowUser(<?=$_SESSION['userid'];?>,<?=$user['id']?>);" id="unfollowBtn1" type="button" class="primary-line-btn" value="Following">
                      </form>
                <?php
                  } else { //user not following topic
                ?>
                    <form>
                      <input onclick="followUser(<?=$_SESSION['userid'];?>,<?=$user['id']?>);" id="followBtn1" type="button" class="primary-line-btn" value="Follow">
                    </form>
                <?php
                    }
                  }
                ?>
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
              <h4 class="modal-title" id="myModalLabel">Topics</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                  <?php
                    foreach ($topics as $topic) {
                  ?>
                    <div class="col-sm-12">
                      <?= topicCard($topic["id"]); ?>
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
  <script>
  var followBtn = "Follow";
  var unfollowBtn = "Following";

  function followUser(currentUser, userid) {
      if (followBtn == "Following") {
          unfollowUser(currentUser, userid);
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
              followBtn = this.responseText.trim();
              unfollowBtn = this.responseText.trim();
              $('#followBtn1').val(this.responseText.trim());
              $('#unfollowBtn1').val(this.responseText.trim());
          }
      };
      xmlhttp.open("GET","followFunctions?userid="+userid+"&currentuser="+currentUser+"&action=followuser",true);
      xmlhttp.send();
  }

  function unfollowUser(currentUser, userid) {
      if (unfollowBtn == "Follow") {
          followUser(currentUser, userid);
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
              followBtn = this.responseText.trim();
              unfollowBtn = this.responseText.trim();
              $('#followBtn1').val(this.responseText.trim());
              $('#unfollowBtn1').val(this.responseText.trim());
          }
      };
      //xmlhttp.open("GET","unfollowPosts?userid="+userid+"&postid="+postid,true);
      xmlhttp.open("GET","followFunctions?userid="+userid+"&currentuser="+currentUser+"&action=unfollowuser",true);
      xmlhttp.send();
  }
  </script>
</html>
