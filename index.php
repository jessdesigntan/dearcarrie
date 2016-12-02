<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $mainTopics = displayMainTopics();
?>
<html lang="en">
  <?php head("Dear Carrie"); ?>

  <body>
    <?= navbar(); ?>

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
            <?= mainSideContent(); ?>
          </div><!-- END right column col-sm-4 -->

      </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
  </body>
</html>
