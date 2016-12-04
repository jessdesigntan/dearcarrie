<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $featuredTopics = displayFeaturedTopics();
  $curatedTopics = displayCuratedTopics();
?>

<html lang="en">
  <?php head("All Topics"); ?>

  <body>
    <?= navbar(); ?>
    <div class="page-container">
      <h3 class="hero-center">Featured Topics</h3>
      <div class="row">
          <?php foreach ($featuredTopics as $featuredTopic) { ?>
          <div class="col-sm-6">
              <div class="featured-topics">
                  <a href="topicDetails?topicID=<?=$featuredTopic["id"];?>">
                      <img src="<?=$featuredTopic["background"];?>" class="img-responsive">
                      <div class="text">
                          <h3><?=$featuredTopic["title"];?></h3>
                          <p><?=$featuredTopic["posts"];?> Posts</p>
                      </div>
                  </a>
              </div>
          </div>
          <?php } ?>
      </div>

      <h3 class="hero-center">Curated Topics</h3>
      <div class="row">
          <?php
            foreach ($curatedTopics as $topic) {
            $postCount = countPostByTopicID($topic["id"]);
            $followerCount = countFollowersByTopicID($topic["id"]);
            $followingTopic = isFollowingTopic($_SESSION["userid"],$topic["id"]);
          ?>
            <div class="col-sm-12">
                <div class="card topic-card">
                    <div class="image">
                      <a href="topicDetails?topicID=<?=$topic["id"];?>"><img src="<?=$topic["main_image"];?>" class="img-responsive"></a>
                    </div>

                    <div class="content short">
                      <a href="topicDetails?topicID=<?=$topic["id"];?>">
                        <h4><?=$topic["title"];?></h4>
                        <p><?=$topic["description"];?></p>
                        <div class="followers"><?=$followerCount;?> Followers</div>
                        <div class="posts"><?=$postCount;?> Posts</div>
                      </a>
                    </div>

                    <div class="action">
                      <?php
                        if (!checkLogin()) {
                          if ($followingTopic) { //user following topic
                      ?>
                            <form>
                              <input type="hidden" name="userid" value='<?=$_SESSION["userid"];?>'>
                              <input type="hidden" name="topic" value='<?=$topic["id"]?>'>
                              <input onclick="unfollowTopic(<?=$_SESSION['userid'];?>,<?=$topic['id']?>);" id="unfollowBtn1" type="button" class="primary-line-btn" value="Following" onmouseover="unfollowMouseOver();" onmouseout="unfollowMouseOut()">
                            </form>
                      <?php
                        } else { //user not following topic
                      ?>
                          <form>
                            <input type="hidden" name="userid" value='<?=$_SESSION["userid"];?>'>
                            <input type="hidden" name="topic" value='<?=$topic["id"]?>'>
                            <input onclick="followTopic(<?=$_SESSION['userid'];?>,<?=$topic['id']?>);" id="followBtn1" type="button" class="primary-line-btn" value="Follow Topic">
                          </form>
                      <?php
                          }
                        }
                      ?>
                    </div>
                </div>
            </div><!-- END col-sm-12 -->
          <?php } ?>
      </div>
    </div><!-- END page-container -->


    <?= footer(); ?>
  </body>

  <script>
  var followBtn = "Follow Topic";
  var unfollowBtn = "Following";

  function followTopic(userid, topicid) {
      if (followBtn == "Following") {
          unfollowTopic(userid, topicid);
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
      xmlhttp.open("GET","followTopics?userid="+userid+"&topicid="+topicid,true);
      xmlhttp.send();
  }

  function unfollowTopic(userid, topicid) {
      if (unfollowBtn == "Follow Topic") {
          followTopic(userid, topicid);
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
      xmlhttp.open("GET","unfollowTopics?userid="+userid+"&topicid="+topicid,true);
      xmlhttp.send();
  }
  </script>
</html>
