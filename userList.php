<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Dear Carrie - Admin User List"); ?>

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
            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php for ($i=1; $i<=10; $i++) { ?>
                <tr>
                    <td>123123</td>
                    <td>Jess Tan</td>
                    <td>jess_tjl@hotmail.com</td>
                    <td>Normal</td>
                    <td><a href="#" class="admin-sec-color">Edit</a></td>
                    <td><a href="userDetails" class="admin-sec-color">View</a></td>
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
        $("#usersNav").addClass("active");
    </script>
  </body>

</html>
