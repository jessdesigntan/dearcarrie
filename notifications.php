<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectNonUsers();
  $notifications = getNotificationsByUserID($_SESSION["userid"]);
?>

<html lang="en">
  <?php head("Add Post"); ?>

  <body>
    <?= navbar(); ?>
    <div class="page-container">
      <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
              <div class="content-title">
                  <h4>Notifications</h4>
              </div>
              <?php
              foreach($notifications as $notification) {
                $user = getUserNameByID($notification["from_user"]);
                $comment = getCommentByID($notification["item"]);
                changeNotificationSeen($_SESSION["userid"]);

                if (!$notification["seen"]) {
                    echo '<div class="media active">';
                }

                else {
                  echo '<div class="media">';
                }
              ?>
                <!--<div class="media active">-->
                    <div class="media-left">
                        <a href="profile">
                            <img class="media-object" src="<?=$user["image"];?>">
                        </a>
                    </div>
                    <div class="media-body">
                        <?php if ($notification["type"] == "user_follow") { ?>
                              <a href="profile?userID=<?=$user["id"];?>" class="primary-color"><?=$user["name"];?></a> is following you now
                        <?php } if ($notification["type"] == "post_like") { ?>
                              <a href="profile?userID=<?=$user["id"];?>" class="primary-color"><?=$user["name"];?></a> like your <a href="post?postID=<?=$notification["item"];?>" class="primary-color">post</a>
                        <?php } if ($notification["type"] == "comment_new") { ?>
                              <a href="profile?userID=<?=$user["id"];?>" class="primary-color"><?=$user["name"];?></a> commented on your <a href="post?postID=<?=$notification["item"];?>" class="primary-color">post</a>
                        <?php } if ($notification["type"] == "comment_like") { ?>
                              <a href="profile?userID=<?=$user["id"];?>" class="primary-color"><?=$user["name"];?></a> liked your <a href="post?postID=<?=$comment["postid"];?>" class="primary-color">comment</a>
                        <?php } if ($notification["type"] == "post_follow") { ?>
                              <a href="profile?userID=<?=$user["id"];?>" class="primary-color"><?=$user["name"];?></a> is following your <a href="post?postID=<?=$notification["item"];?>" class="primary-color">post</a>
                        <?php } if ($notification["type"] == "new_comment_post_follow") { ?>
                              There is a new comment on the <a href="post?postID=<?=$notification["item"];?>" class="primary-color">post</a> you follow
                        <?php } if ($notification["type"] == "new_comment_post_follow") { ?>
                              There is a new comment on the <a href="post?postID=<?=$notification["item"];?>" class="primary-color">post</a> you commented
                        <?php } ?>
                        <div class="new pull-right primary-color">&bull;</div>
                    </div>

                    <div class="media-right">
                        <p class="small light-text"><?php echo calculateDays($notification['timestamp']); ?></p>
                    </div>
                </div>
              <?php } ?>
          </div><!-- END left column col-sm-8 -->
      </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
  </body>
</html>
