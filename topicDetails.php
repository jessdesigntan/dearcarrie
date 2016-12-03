<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $topicID = $_GET["topicID"];
  $topic = getTopicByID($topicID);
  $posts = getPostsByTopicID($topicID);
  $postCount = countPostByTopicID($id);
  $followingTopic = isFollowingTopic($_SESSION["userid"],$topicID);
?>


<html lang="en">
  <?php head("Topic Details"); ?>

  <body>
    <?= scrollTopBtn(); ?>
    <?= navbar(); ?>

    <div class="page-container">
      <div class="topic-header">
        <div>
          <img src="<?=$topic["background"];?>" class="img-responsive">
          <div class="text">
              <h1><?=$topic["title"];?></h1>
              <p class="lead"><?=$topic["short_desc"];?></p>
              <?php
                if (!checkLogin()) {
                  if ($followingTopic) {
              ?>
                    <a class="white-line-btn">Unfollow Topic</a>
              <?php
                } else {
              ?>
                    <a class="white-line-btn">Follow Topic</a>
              <?php
                  }
                }
              ?>
          </div>
        </div>
      </div>

      <div class="row">
          <div class="col-sm-9">
            <div class="content-title">
              <h4>Top Stories For You</h4>
            </div>
            <?php foreach ($posts as $post) {
              card($post["id"]);
            }
            ?>
          </div><!-- END left column col-sm-8 -->
          <div class="col-sm-3">
              <div class="main-sidebar">
                  <div class="side-content">
                      <div class="content-title">
                          <h4>About</h4>
                          <?php
                            if (!checkLogin()) {
                              if ($followingTopic) {
                          ?>
                                <a class="follow-btn">Unfollow Topic</a>
                          <?php
                            } else {
                          ?>
                                <a class="follow-btn">Follow Topic</a>
                          <?php
                              }
                            }
                          ?>
                      </div>
                      <div class="mBottom-20">
                          <p><?=$topic["title"];?></p>
                          <p><?=$topic["description"];?></p>
                      </div>
                      <div class="mBottom-40">
                          <p>Tel: <?=$topic["tel"];?></p>
                          <a href="#"><?=$topic["url"];?></a>
                      </div>
                      <div class="dual-hero">
                          <div>
                            <p class="topic-detail-title">Followers</p>
                            <p class="lead"><?=$topic["followers"];?></p>
                          </div>
                          <div>
                            <p class="topic-detail-title">Posts</p>
                            <p class="lead"><?=$postCount;?></p>
                          </div>
                      </div>
                  </div>
                  <script>staticBar('.main-sidebar','550')</script>
              </div>
          </div><!-- END right column col-sm-4 -->

      </div>
    </div><!-- END page-container -->


    <?= footer(); ?>
  </body>

</html>
