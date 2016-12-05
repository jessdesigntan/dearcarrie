<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $users = displayAllUsers();
?>
<html lang="en">
  <?php head("Dear Carrie - Admin User List"); ?>
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
            <li class="active"><a href="#">Users</a></li>
        </ol>
        <div class="panel panel-default summary-panel">
            <div class="panel-heading">
                <h4 class="admin-sec-color">Total Users: 455</h4>
            </div>
            <table id="user-list" class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?=$user["id"];?></td>
                    <td><?=$user["name"];?></td>
                    <td><?=$user["email"];?></td>
                    <td><?=$user["role"];?></td>
                    <td><a href="userDetails?userID=<?=$user["id"];?>" class="admin-sec-color">View</a></td>
                </tr>
                <?php } ?>
                </tbody>
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
        $("#usersNav").addClass("active");
        $('#user-list').DataTable( {
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
