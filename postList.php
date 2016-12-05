<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $posts = displayAllPost();
?>
<html lang="en">
  <?php head("Dear Carrie - Admin Post List"); ?>
  <script src="css/jquery.dataTables.min.css"></script>
  <script src="css/dataTables.bootstrap.min.css"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li class="active"><a href="#">Posts</a></li>
        </ol>
        <div class="panel panel-default summary-panel">
            <div class="panel-heading">
                <h4 class="admin-sec-color">Total Posts: 3455</h4>
            </div>
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
                    <td>43</td>
                    <td>10</td>
                    <td><a href="postDetails?postID=<?=$post["id"];?>" class="admin-sec-color">View</a></td>
                </tr>
                <?php } ?>
                </tbody>
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
