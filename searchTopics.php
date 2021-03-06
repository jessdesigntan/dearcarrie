<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $keyword = $_GET["search_keyword_id"];
  $filters = $_POST["value"];
  //$posts = searchPost($keyword);
  $conn = connectToDataBase();

    if(!isset($_POST['value'])) {
      $posts = getCountTopics($keyword);
    }
    else
    {
      if($_POST['value'] == 'allTime') {
          // query to get all posts under the topic
          $sql = "SELECT * FROM posts WHERE id IN (SELECT postid FROM topics INNER JOIN curation WHERE title lIKE '%$keyword%' AND published = 1 AND topicid = id) AND published = 1 order by timestamp desc";
      }
      elseif($_POST['value'] == 'today') {
          // query to get all today's posts under the topic
          $sql = "SELECT * FROM posts WHERE id IN (SELECT postid FROM topics INNER JOIN curation WHERE title LIKE '%$keyword%' AND published = 1 AND topicid = id) AND DATE(timestamp) = curdate() AND published = 1 order by timestamp desc";
      }
      elseif($_POST['value'] == 'thisMonth') {
          // query to get all this month's posts under the topic
          $sql = "SELECT * FROM posts WHERE id IN (SELECT postid FROM topics INNER JOIN curation WHERE title LIKE '%$keyword%' AND published = 1 AND topicid = id) AND MONTH(timestamp) = month(curdate()) AND YEAR(timestamp) = year(curdate()) AND published = 1 order by timestamp desc";
      } 
      elseif($_POST['value'] == 'thisYear') {
          // query to get all this year's posts under the topic
          $sql = "SELECT * FROM posts WHERE id IN (SELECT postid FROM topics INNER JOIN curation WHERE title LIKE '%$keyword%' AND published = 1 AND topicid = id) AND YEAR(timestamp) = year(curdate()) AND published = 1 order by timestamp desc";
      }
      
      $result = $conn->query($sql);
      $posts = array();

      if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
           $posts[] = $row;
         }
      } else {
         //showErrorMessage("No posts found");
      }
      $conn->close();
    }
 
?>

<html lang="en">
  <?php head("Dear Carrie Search - ".$keyword); ?>


  <body>
    <?= scrollTopBtn(); ?>
    <?= navbar(); ?>
    <div class="page-container">
      <div class="row">
        <div class="col-sm-2">
          <div class="filter-sidebar">
            <?= sideFilter($keyword); ?>
          </div>
        </div><!-- END right column col-sm-3 -->


        <div class="col-sm-8">
          <div class="content-title">
            <h4>Search Results: <span class="primary-color"><?=$keyword;?></span></h4>
              
              <form action="searchtopics.php?search_keyword_id=<?=$keyword;?>&tp=topic" method='post' name='form_filter' style="float:right;">
              Show posts: &nbsp;
                <select name="value" onchange="this.form.submit()">
                    <option value="allTime" <?php if ($filters == "allTime"){echo "selected";}?> >All time</option>
                    <option value="today" <?php if ($filters == "today"){echo "selected";}?> >Today</option>
                    <option value="thisMonth" <?php if ($filters == "thisMonth"){echo "selected";}?> >This month</option>
                    <option value="thisYear" <?php if ($filters == "thisYear"){echo "selected";}?> >This year</option>
                </select>
                  <!--<input type='submit' value = 'Filter'>-->
              </form>
            
          </div>
          <!-- do an if-else for posts count -->
          <?php if(count($posts) == 0) { ?>
            <div class="post-empty-state">
                <div>
                    <h4>No posts found</h4>
                </div>
            </div>
          <?php } else {
            foreach ($posts as $post) {
              card($post["id"]);
            }
          }?>
        </div><!-- END left column col-sm-9 -->

      </div>
    </div><!-- END page-container -->


    <?= footer(); ?>

  </body>
</html>
