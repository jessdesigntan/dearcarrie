<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $topicID = $_GET["topicID"];
  $topic = getTopicByID($topicID);
  $posts = getPostsByTopicID($topicID);
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
              <a class="white-line-btn">Follow Topic</a>
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
              <?= topicSideContent($topicID); ?>
            </div>
          </div><!-- END right column col-sm-4 -->

      </div>
    </div><!-- END page-container -->


    <?= footer(); ?>
  </body>
</html>
