<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $users = displayAllUsers();
?>
<html lang="en">
  <?php head("Dear Carrie - Admin User List"); ?>
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
            <li class="active"><a href="#">Users</a></li>
        </ol>

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
