<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<?php redirectToLogin($_SESSION["role"], "admin"); ?>
<html lang="en">
  <?php head("Dear Carrie - Admin Dashboard"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <h4 class="hero-center">Today's Summary</h4>
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="panel panel-default summary-panel">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">
                        <h1>37</h1>
                        <p>New users</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="panel panel-default summary-panel">
                    <div class="panel-heading">Posts</div>
                    <div class="panel-body">
                        <h1>37</h1>
                        <p>New posts</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="panel panel-default summary-panel">
                    <div class="panel-heading">Comments</div>
                    <div class="panel-body">
                        <h1>3.4k</h1>
                        <p>New comments</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3  col-xs-6">
                <div class="panel panel-default summary-panel">
                    <div class="panel-heading">Views</div>
                    <div class="panel-body">
                        <h1>12.6k</h1>
                        <p>New views</p>
                    </div>
                </div>
            </div>
        </div><!-- END website summary -->


        <h4 class="hero-center">Top 10 posts today</h4>
        <div class="panel panel-default summary-panel">
            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <th>No.</th>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>User ID</th>
                    <th>Likes</th>
                    <th>Comment</th>
                    <th></th>
                </tr>
                <?php for ($i=1; $i<=10; $i++) { ?>
                <tr>
                    <td><?=$i;?></td>
                    <td>123123</td>
                    <td>Things I wish people knew about depression</td>
                    <td>344343</td>
                    <td>43</td>
                    <td>10</td>
                    <td><a href="#" class="admin-sec-color">View</a></td>
                </tr>
                <?php } ?>
            </table>
        </div><!-- END top 10 post today-->

        <h4 class="hero-center">Top 10 posts all-time</h4>
        <div class="panel panel-default summary-panel">
            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <th>No.</th>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>User ID</th>
                    <th>Likes</th>
                    <th>Comment</th>
                    <th></th>
                </tr>
                <?php for ($i=1; $i<=10; $i++) { ?>
                <tr>
                    <td><?=$i;?></td>
                    <td>123123</td>
                    <td>Things I wish people knew about depression</td>
                    <td>344343</td>
                    <td>43</td>
                    <td>10</td>
                    <td><a href="#" class="admin-sec-color">View</a></td>
                </tr>
                <?php } ?>
            </table>
        </div><!-- END top 10 post all time-->
    </div><!-- ./page-container -->

    <?php footer(); ?>
  </body>

  <script>
    $("#dashboardNav").addClass("active");
  </script>

</html>
