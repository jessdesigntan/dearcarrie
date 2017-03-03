<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $userID = $_GET["userID"];
  $user = getUserByID($userID);
  $followingUser = isFollowingUser($_SESSION["userid"], $user["id"]);
  $topics = getTopicsFollowedByUserID($userID);
  $likedPosts = getPostsLikedByUser($userID);
  $comments = getCommentsByUserID($userID);
  $topicCount = countTopicsFollowedByUserID($userID);
  $followingUsers = getFollowing($userID);
  $followers = getFollowers($userID);
  $postFollow = getPostsFollowedByUserID($userID);
?>

<html lang="en">
  <?php head("Dear Carrie - ".$user["name"]); ?>

  <body>
    <?= navbar(); ?>
    <div class="page-container">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
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
                <p><?=countFollowingByUserID($userID);?> Following</p>
                <p><?=$topicCount;?> Topics</p>
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

          <div class="segment-nav">
              <ul>
                  <li><a id="postTab" onclick="nav(this.id)">Posts</a></li>
                  <?php if (isset($_SESSION["userid"]) && $_SESSION["userid"] == $userID) {?>
                    <li><a id="likeTab" onclick="nav(this.id)">Your Likes</a></li>
                    <li><a id="commentTab" onclick="nav(this.id)">Your Comments</a></li>
                    <li><a id="topicTab" onclick="nav(this.id)">Topics</a></li>
                    <li><a id="postFollowTab" onclick="nav(this.id)">Posts You Follow</a></li>
                  <?php } ?>
                  <li><a id="followingTab" onclick="nav(this.id)">Following</a></li>
                  <li><a id="followTab" onclick="nav(this.id)">Followers</a></li>
              </ul>
          </div>

          <!-- 1. post div -->
          <?php
            $posts = displayAllPostByUserID($userID);

            if (count($posts) == 0) {
          ?>
              <div class="post-empty-state" id="postDiv">
                  <div>
                      <h4>No posts yet</h4>
                      <?php if ($_SESSION["userID"] == $userID) { ?>
                      <a class="primary-line-btn" href="addPost">Write something</a>
                      <?php } ?>
                  </div>
              </div>
          <?php
            }
            else {
          ?>
          <div id="postDiv">
            <?php
                foreach ($posts as $post) {
                  card($post["id"]);
                }
            ?>
          </div>
          <?php
            }
          ?><!-- 1. /post div -->

          <!-- 2. /likes div -->
          <div id="likesDiv">
              <?php
              if (count($likedPosts) == 0) {
              ?>
                <div class="post-empty-state">
                    <div>
                        <h4>No likes yet</h4>
                    </div>
                </div>
              <?php
              } else {
                foreach($likedPosts as $likedPost) {
                  card($likedPost["id"]);
                }
              }
              ?>
          </div>
          <!-- 2. /likes div -->

          <!-- 3. /comment div -->
          <div id="commentsDiv">
              <?php
                if (count($likedPosts) == 0) {
              ?>
                <div class="post-empty-state">
                    <div>
                        <h4>No comments yet</h4>
                    </div>
                </div>
              <?php
                } else {
                  foreach($comments as $comment) {
                    commentCardProfile($comment["id"]);
                  }
                }
              ?>
          </div>
          <!-- 3. /comment div -->

          <!-- 4. /topics div -->
          <div id="topicsDiv">
              <?php if (count($topics) == 0) { ?>
                <div class="post-empty-state">
                    <div>
                        <h4>Not following any topics yet</h4>
                        <a class="primary-line-btn" href="topic">View Topics</a>
                    </div>
                </div>
              <?php
                } else {
                  foreach($topics as $topic) {
                  topicCard($topic["id"]);
                }
              }
              ?>
          </div>
          <!-- 4. /comment div -->

          <!-- 5. /following div -->
          <div id="followingDiv">
              <?php if (count($followingUsers) == 0) { ?>
                <div class="post-empty-state">
                    <div>
                        <h4>Not following anyone yet</h4>
                    </div>
                </div>
              <?php
                } else {
                  foreach($followingUsers as $followingUser) {
                  userCard($followingUser["userid"]);
                }
              }
              ?>
          </div>
          <!-- 5. /following div -->

          <!-- 6. /follower div -->
          <div id="followersDiv">
              <?php if (count($followers) == 0) { ?>
                <div class="post-empty-state">
                    <div>
                        <h4>No followers yet</h4>
                    </div>
                </div>
              <?php
                } else {
                  foreach($followers as $follower) {
                  userCard($follower["follower"]);
                }
              }
              ?>
          </div>
          <!-- 6. /follower div -->

          <!-- 6. /postfollowDiv -->
          <div id="postfollowDiv">
              <?php if (count($postFollow) == 0) { ?>
                <div class="post-empty-state">
                    <div>
                        <h4>Not following any posts yet</h4>
                    </div>
                </div>
              <?php
                } else {
                  foreach($postFollow as $post) {
                  card($post["id"]);
                }
              }
              ?>
          </div>
          <!-- 7. /postfollowDiv -->

        </div><!-- ./col-sm-8 -->
      </div><!-- ./row -->


    </div>

    <?= footer(); ?>
  </body>

  <script src="js/profile.js"></script>
  <script src="js/followTopic.js"></script>
</html>
