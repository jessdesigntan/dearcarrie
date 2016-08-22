<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Anti-depression"); ?>

  <body>
    <?= navbar(); ?>
    <div class="page-container wow fadeInUp">
      <div class="row">
        <div class="col-sm-2">
          <div class="filter-sidebar">
            <?= sideFilter(); ?>
          </div>
        </div><!-- END right column col-sm-3 -->
        <div class="col-sm-8">
          <div class="content-title">
            <h4>Search Results: <span class="primary-color">Bipolar</span></h4>
            <a href="#">Sort by Relevance &#9662;</a>
          </div>
          <?php for ($i=1; $i<=10; $i++) {
            card();
          }
          ?>
        </div><!-- END left column col-sm-9 -->

      </div>
    </div><!-- END page-container -->

    <footer class="footer">
      <div class="page-container">
        <p>All rights Reserved, NAME &#169;</p>
      </div>
    </footer>
  </body>
</html>
