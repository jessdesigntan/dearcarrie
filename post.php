<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Post Title"); ?>

  <body>
    <?= scrollTopBtn(); ?>
    <?= navbar(); ?>
    <div class="page-container wow fadeInUp">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <?= cardExpand(); ?>
              <h4>Responses</h4>
              <form class="comment-box">
                  <textarea placeholder="Write a comment..." onkeyup="auto_grow(this)"></textarea>
                  <button class="primary-line-btn" type="submit">Submit</button>
              </form>
              <hr/>
              <?php
                for ($i=0; $i < 20; $i++) {
                  commentCard();
                }
              ?>
        </div><!-- END right column col-sm-8 -->

      </div>
    </div><!-- END page-container -->

    <?php suggestedReading(); ?>

    <?= footer(); ?>
  </body>
</html>
