<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Post Title"); ?>

  <body>
    <?= scrollTopBtn(); ?>

    <?= navbar(); ?>
    <div class="page-container wow fadeInUp">
      <div class="row">
        <div class="col-sm-8">
            <?= cardExpand(); ?>
              <h4>Responses</h4>
              <form class="comment-box">
                  <input type="text" placeholder="Write a comment...">
                  <button class="primary-line-btn" type="submit">Submit</button>
              </form>
              <hr/>
              <?php
                for ($i=0; $i < 20; $i++) {
                  commentCard();
                }
              ?>
        </div><!-- END right column col-sm-3 -->
        <div class="col-sm-2">
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
