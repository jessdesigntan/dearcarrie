<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $postID = $_GET["postID"];
  $post = getPostByID($postID);
  $comments = getAllCommentsByPostID($postID);
  $suggestedPosts = suggestedPost();
  $commentCount = countCommentsByPostID($postID);
  increasePostView($postID);
?>

<html lang="en">
  <?php head($post["title"], $post["title"]); ?>
  <body>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '369194556763501',
          xfbml      : true,
          version    : 'v2.8'
        });
        FB.AppEvents.logPageView();
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

    <?= scrollTopBtn(); ?>
    <?= navbar(); ?>

    <div class="page-container">
      <div class="fixed-share-sidebar">
          <div id="fb-root"></div>
          <h4>Share</h4>
          <ul>
              <li><a href="http://facebook.com/share.php?u=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" data-image="images/logo.svg" data-title="<?php echo $post['title'];?>" data-desc="<?php echo $post['description'];?>" class="fb_share" target="_blank"><img src="images/facebook.svg"></a></li>
              <!--<li><a href="https://twitter.com/intent/tweet?original_referer=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>&text=<?php echo $post['title'];?>&url=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" name="tweet_share" target="_blank"><img src="images/twitter.svg"></a></li> -->
          </ul>
      </div>
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <?= cardExpand($post["id"]); ?>
              <h4><?php if ($commentCount != 0) { echo $commentCount; } else { echo '0'; } ?> Responses</h4>
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
                        <h4>Sign up or login to start commenting</h4>
                        <a class="primary-line-btn" href="signup">Sign up</a>
                        <a class="primary-line-btn" href="login">Login</a>
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

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <script src="js/followPost.js"></script>
</html>
