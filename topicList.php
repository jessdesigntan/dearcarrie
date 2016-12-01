<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $topics = displayAllTopics();
?>
<html lang="en">
  <?php head("Dear Carrie - Admin Topic List"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li class="active"><a href="#">Topics</a></li>
        </ol>
        <div class="panel panel-default summary-panel">
            <div class="panel-heading">
                <h4 class="admin-sec-color">Total Topics: 13</h4>
            </div>
            <div class="panel-body">
                  <a href="addTopic" class="btn btn-primary" style="color:white;" >Add Topic</a>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <th>Date</th>
                    <th>Topic ID</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Followers</th>
                    <th>Post</th>
                    <th></th>
                </tr>
                <?php foreach ($topics as $topic) { ?>
                <tr>
                    <td><?=$topic["date"];?></td>
                    <td><?=$topic["id"];?></td>
                    <!-- remember to do a substring function to keep the text to one line -->
                    <td><?=$topic["title"];?></td>
                    <td>
                        <?php if ($topic["type"] == "featured") {?>
                          <span class="label label-warning"><?=$topic["type"];?></span>
                        <?php } else if($topic["type"] == "curated") { ?>
                          <span class="label label-success"><?=$topic["type"];?></span>
                        <?php } else { ?>
                          <span class="label label-primary"><?=$topic["type"];?></span>
                        <?php } ?>
                    </td>
                    <td><?=$topic["followers"];?></td>
                    <td><?=$topic["posts"];?></td>
                    <td><a href="adminTopicDetails?topicID=<?=$topic["id"];?>" class="admin-sec-color">View</a></td>
                </tr>
                <?php } ?>
            </table>
        </div><!-- END post table-->

        <nav aria-label="Page navigation">
            <center>
              <ul class="pagination">
                  <li>
                      <a href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                      </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                      <a href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                      </a>
                  </li>
              </ul>
            </center>
        </nav>
    </div><!-- ./page-container -->

    <?php footer(); ?>
    <script>
        $("#topicsNav").addClass("active");
    </script>
  </body>

</html>
