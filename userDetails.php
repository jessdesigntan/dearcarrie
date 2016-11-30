<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<?php redirectToLogin($_SESSION["role"], "admin"); ?>
<html lang="en">
  <?php head("Dear Carrie - Admin User Details"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="userList">Users</a></li>
            <li class="active"><a href="#">Jess Tan</a></li>
        </ol>

        <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-default actionBar hide-mobile">
                  <div class="panel-heading">Actions</div>
                  <div class="panel-body">
                      <button type="submit" class="btn btn-primary btn-block">Update User</a>
                      <button type="button" class="btn btn-danger btn-block">Delete User</a>
                  </div>
              </div>
            </div><!-- ./col-sm-4 -->

            <div class="col-sm-8">
                <form class="editable-fields" action="post">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Date Joined</th>
                            <th>Role</th>
                        </tr>
                        <tr>
                            <td>12312312</td>
                            <td><input type="text" value="jess_tjl@hotmail.com"></td>
                            <td>12 Jan 2016</td>
                            <td>
                                <select>
                                  <option>Normal</option>
                                  <option>Expert</option>
                                  <option>Admin</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <div class="panel panel-default summary-panel mBottom-40">
                        <table class="table table-bordered">
                            <tr>
                                <th>Image</th>
                                <td><img src="images/avatar.png"></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" value="Jess Tan"></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><input type="text" value="Writing my life stories."></td>
                            </tr>
                            <tr>
                                <th>Affliate</th>
                                <td>Facebook</td>
                            </tr>
                        </table>
                    </div><!-- END user details-->
                </form>

                <div class="panel panel-default summary-panel">
                    <div class="panel-heading">All Post (342)</div>
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
            </div><!-- ./col-sm-8 -->
        </div><!-- ./row -->
    </div><!-- ./page-container -->

    <?php footer(); ?>
    <script>
        $("#usersNav").addClass("active");
        staticBar('.actionBar','120');
    </script>
  </body>

</html>
