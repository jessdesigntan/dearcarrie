<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $posts = displayAllPostOrderbyViews();
?>
<html lang="en">
  <?php head("Dear Carrie - Admin Dashboard"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <h4 class="hero-center">Overall Summary</h4>
        <div class="row">
            <div class="col-sm-4 col-xs-6">
                <div class="panel panel-default summary-panel">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">
                        <h1><?=countTotalUsers();?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="panel panel-default summary-panel">
                    <div class="panel-heading">Posts</div>
                    <div class="panel-body">
                        <h1><?=countTotalPosts();?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="panel panel-default summary-panel">
                    <div class="panel-heading">Comments</div>
                    <div class="panel-body">
                        <h1><?=countTotalComments();?></h1>
                    </div>
                </div>
            </div>
        </div><!-- END website summary -->


        <h4 class="hero-center">Most viewed post</h4>
        <div class="panel panel-default summary-panel">
            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>User ID</th>
                    <th>Likes</th>
                    <th>Comment</th>
                    <th>Views</th>
                    <th></th>
                </tr>
                <?php foreach ($posts as $post) { ?>
                <tr>
                    <td><?=$post["id"];?></td>
                    <td><?=$post["title"];?></td>
                    <td><?=$post["userid"];?></td>
                    <td><?=$post["likes"];?></td>
                    <td><?=$post["comments"];?></td>
                    <td><?=$post["views"];?></td>
                    <td><a href="postDetails?postID=<?=$post["id"];?>" class="admin-sec-color">View</a></td>
                </tr>
                <?php } ?>
            </table>
        </div><!-- END top 10 post today-->

    </div><!-- ./page-container -->

    <?php footer(); ?>
  </body>

  <script>
    $("#dashboardNav").addClass("active");
  </script>

</html>
