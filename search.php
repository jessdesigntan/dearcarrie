<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $keyword = $_GET["keyword"];
  $searchOption = $_GET["searchOption"];
?>

<html lang="en">
  <?php head("Anti-depression"); ?>


  <body>
    <?= scrollTopBtn(); ?>
    <?= navbar(); ?>
    <div class="page-container">
      <div class="row">
        <div class="col-sm-2">
          <div class="filter-sidebar">
            <?= sideFilter(); ?>
          </div>
        </div><!-- END right column col-sm-3 -->
       
        
        <div class="col-sm-8">
          <div class="content-title">
            <h4>Search Results: <span class="primary-color"><?=$keyword;?></span></h4>
            <a href="#">Sort by Relevance &#9662;</a>
          </div>
          <?php
            if ($searchOption == "suggestions") {
                $posts = searchPost($keyword);
                foreach ($posts as $post) {
                  card($post["id"]);
                }
            }
            else if($searchOption == "topic_suggestions"){
                $topics = searchTopic($keyword);
              foreach ($topics as $topic) {
                topicCard($topic["id"]);
              }
            }
            else {
                $posts = searchPostByDate($keyword);
                foreach ($posts as $post) {
                  card($post["id"]);
                }
            }
          ?>
        </div><!-- END left column col-sm-9 -->

      </div>
    </div><!-- END page-container -->


    <?= footer(); ?>

  </body>
</html>
