<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $keyword = $_GET["keyword"];
?>

<html lang="en">
  <?php head("Anti-depression"); ?>
 <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->

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
            $posts = searchPost($keyword);
            foreach ($posts as $post) {

              card($post["id"]);
        
            }

          ?>
        </div><!-- END left column col-sm-9 -->

      </div>
    </div><!-- END page-container -->


    <?= footer(); ?>
 <!--   <script>
      $(function() {
        $( "#skills" ).autocomplete({
          source: 'search.php'
        });
    });
    </script> -->
  </body>
</html>
