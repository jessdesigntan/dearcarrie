<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<?php redirectToLogin($_SESSION["role"], "admin"); ?>
<html lang="en">
  <?php head("Dear Carrie - Admin Report List"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li class="active"><a href="#">Report</a></li>
        </ol>
        <div class="panel panel-default summary-panel">
            <div class="panel-heading">
                <h4 class="admin-sec-color">Total Report: 25</h4>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <th>Report ID</th>
                    <th>Date</th>
                    <th>User ID</th>
                    <th>Post ID</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <?php for ($i=1; $i<=10; $i++) { ?>
                <tr>
                    <td>123123</td>
                    <td>12 Jan 2016</td>
                    <td>5454</td>
                    <td>34534</td>
                    <td>Normal</td>
                    <td>Seen/ unseen</td>
                    <td><a href="reportDetails" class="admin-sec-color">View</a></td>
                </tr>
                <?php } ?>
            </table>
        </div><!-- END top 10 post today-->

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
        $("#reportNav").addClass("active");
    </script>
  </body>

</html>
