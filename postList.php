<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $posts = displayAllPostAdmin();
?>
<html lang="en">
  <?php head("Dear Carrie - Admin Post List"); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.12/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.12/datatables.min.js"></script>
  <style>
  /* hard overwrite */
  .form-control {
    height: 30px !important;
    border-radius: 0;
    letter-spacing: 1px;
    margin: 0 5px;
  }
  </style>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li class="active"><a href="#">Posts</a></li>
        </ol>

        <table id="post-list" class="table table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th>Post ID</th>
                <th>Date</th>
                <th>Title</th>
                <th>User ID</th>
                <th>Likes</th>
                <th>Comment</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($posts as $post) { ?>
            <tr>
                <td><?=$post["id"];?></td>
                <td><?=$post["timestamp"];?></td>
                <!-- remember to do a substring function to keep the text to one line -->
                <td><?=$post["title"];?></td>
                <td><a href="userDetails?userID=<?=$post["userid"];?>"><?=$post["userid"];?></a></td>
                <td><?= countPostLikes($post["id"]); ?></td>
                <td><?= countCommentsByPostID($post["id"]); ?></td>
                <td><a href="postDetails?postID=<?=$post["id"];?>" class="admin-sec-color">View</a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>


    </div><!-- ./page-container -->

    <?php footer(); ?>
    <script>
        $("#postsNav").addClass("active");

        $('#post-list').DataTable( {
            columnDefs: [ {
                targets: [ 0 ],
                orderData: [ 0, 1 ]
            }, {
                targets: [ 1 ],
                orderData: [ 1, 0 ]
            }, {
                targets: [ 4 ],
                orderData: [ 4, 0 ]
            } ]
        } );
    </script>
  </body>

</html>
