<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $userid = $_GET["userID"];
  $user = getUserByID($userid);
  $posts = displayAllPostByUserID($userid);
?>
<html lang="en">
  <?php head("Dear Carrie - Admin User Details"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="userList">Users</a></li>
            <li class="active"><?=$user["name"];?></li>
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
                            <td><?=$user["id"];?></td>
                            <td><input type="text" value="jess_tjl@hotmail.com"></td>
                            <td><?=$user["role"];?></td>
                            <td>
                                <select>
                                    <option <?php if($user["role"]=="admin") echo "selected" ?> value="admin">Admin</option>
                                    <option <?php if($user["role"]=="normal") echo "selected" ?> value="normal">Normal</option>
                                    <option <?php if($user["role"]=="expert") echo "selected" ?> value="expert">Expert</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <div class="panel panel-default summary-panel mBottom-40">
                        <table class="table table-bordered">
                            <tr>
                                <th>Image</th>
                                <td><img src="<?=$user["image"];?>" width="80"></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" value="<?=$user["name"];?>"></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><input type="text" value="<?=$user["description"];?>"></td>
                            </tr>
                            <tr>
                                <th>Affliate</th>
                                <td><?=$user["affliate"];?></td>
                            </tr>
                        </table>
                    </div><!-- END user details-->
                </form>

                <div class="panel panel-default summary-panel">
                    <div class="panel-heading">All Post (342)</div>
                    <table class="table table-hover table-bordered table-striped">
                        <tr>
                            <th>Post ID</th>
                            <th>Title</th>
                            <th>Likes</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                        <?php foreach ($posts as $post) { ?>
                        <tr>
                            <td><?=$post["id"];?></td>
                            <td><?=$post["title"];?></td>
                            <td><?=$post["likes"];?></td>
                            <td><?=$post["comments"];?></td>
                            <td><a href="postDetails?postID=<?=$post["id"];?>" class="admin-sec-color">View</a></td>
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
