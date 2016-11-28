<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

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
                <?php for ($i=1; $i<=10; $i++) { ?>
                <tr>
                    <td>12 Jan 2016</td>
                    <td>123123</td>
                    <!-- remember to do a substring function to keep the text to one line -->
                    <td>Bipolar</td>
                    <td><a href="userDetails">Featured/Main/Curated</a></td>
                    <td>43</td>
                    <td>10</td>
                    <td><a href="adminTopicDetails" class="admin-sec-color">View</a></td>
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
