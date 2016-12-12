<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $mainTopics = displayMainTopics();
  $featuredTopics = displayFeaturedTopics();
  $trendingPosts = displayTrendingPosts();
?>
<html lang="en">
  <?php head("Dear Carrie"); ?>

  <body>
    <?= navbar(); ?>
    <div class="loader"></div>
    <div class="page-container">
      <div class="main-banner-grid row">
          <?php
            foreach ($mainTopics as $topic) {
            if ($topic["order_num"] == 1) {
          ?>
            <div class="col-sm-8 col-xs-12">
                <a href="topicDetails?topicID=<?=$topic["id"];?>"><img src="<?=$topic["main_image"];?>" class="img-responsive"></a>
            </div>
          <?php } else { ?>
            <div class="col-sm-4 col-xs-12">
                <a href="topicDetails?topicID=<?=$topic["id"];?>"><img src="<?=$topic["main_image"];?>" class="img-responsive"></a>
            </div>
          <?php } }?>
      </div>
      <br/><br/>

      <div class="row">
          <div class="col-sm-9">
            <div class="content-title">
              <h4>Top Stories For You</h4>
            </div>
            <?php
              $posts = displayAllPost();
              foreach ($posts as $post) {
                card($post["id"]);
              }
            ?>
          </div><!-- END left column col-sm-8 -->
          <div class="col-sm-3">
              <div class="main-sidebar">
                  <div class="side-content">
                      <div class="content-title">
                        <h4>Trending</h4>
                        <a href="search">Read all &#8594;</a>
                      </div>
                      <?php foreach($trendingPosts as $trendingPost) { ?>
                      <a href="post?postID=<?=$trendingPost['id'];?>" class="mini-card">
                        <p><?=$trendingPost['title'];?></p>
                      </a>
                      <?php } ?>
                  </div>

                  <div class="side-content">
                      <div class="content-title">
                          <h4>Topics</h4>
                          <a href="topic">See all &#8594;</a>
                      </div>
                      <ul>
                          <?php foreach ($featuredTopics as $featuredTopic) { ?>
                          <li><a href="topicDetails?topicID=<?=$featuredTopic["id"];?>"><?=$featuredTopic["title"];?></a></li>
                          <?php } ?>
                      </ul>
                  </div>
              </div>
              <script>staticBar('.main-sidebar','640')</script>
          </div><!-- END right column col-sm-4 -->

      </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
  </body>
</html>
