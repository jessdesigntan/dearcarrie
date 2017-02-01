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
      <!--<h3 class="hero-center">Featured Topics</h3>
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
      </div>-->

      <h3 class="hero-center">Curated Topics</h3>

      <div class="row">
          <?php
            foreach ($curatedTopics as $topic) {
            $postCount = countPostByTopicID($topic["id"]);
            $followerCount = countFollowersByTopicID($topic["id"]);
            $followingTopic = isFollowingTopic(isset($_SESSION["userid"]),$topic["id"]);
          ?>
            <div class="col-sm-12">
                <?php topicCard($topic["id"]); ?>
            </div><!-- END col-sm-12 -->
          <?php } ?>
      </div>
    </div><!-- END page-container -->


    <?= footer(); ?>

  </body>

  <script src="js/followTopic.js"></script>

</html>
