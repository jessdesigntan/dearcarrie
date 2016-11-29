<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Dear Carrie - Admin Report Details"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="reportList">Report</a></li>
            <li class="active"><a href="#">45645</a></li>
        </ol>

        <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-default actionBar hide-mobile">
                  <div class="panel-heading">Actions</div>
                  <div class="panel-body">
                      <p>Status</p>
                      <h4>Not resolved</h4>
                      <button type="submit" class="btn btn-primary btn-block">Change to Resolved</a>
                  </div>
              </div>
            </div><!-- ./col-sm-4 -->

            <div class="col-sm-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Report ID</th>
                        <th>Reporter ID</th>
                        <th>Post ID</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td>12312312</td>
                        <td><a href="#">534534</a></td>
                        <td><a href="#">534534</a></td>
                        <td>Not resolved/ resolved</td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th>Reporter Comment</th>
                    </tr>
                    <tr>
                        <td>"I do not like this post, it is offensive"</td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th>Post content</th>
                    </tr>
                    <tr>
                        <td>Post item here</td>
                    </tr>
                </table>
            </div><!-- ./col-sm-8 -->
        </div><!-- ./row -->
    </div><!-- ./page-container -->

    <?php footer(); ?>
    <script>
        $("#reportNav").addClass("active");
        staticBar('.actionBar','120');
    </script>
  </body>

</html>
