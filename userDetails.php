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
  <link rel="stylesheet" type="text/css" href="css/imgareaselect-animated.css" />
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.imgareaselect.pack.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
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
            <form action="editUserProcess" class="editable-fields" method="post" enctype="multipart/form-data">
            <div class="col-sm-4">
              <div class="panel panel-default actionBar hide-mobile">
                  <div class="panel-heading">Actions</div>
                  <div class="panel-body">
                      <button name="action" value="update" type="submit" class="btn btn-primary btn-block">Update User</a>
                      <button name="action" value="delete" type="submit" class="btn btn-danger btn-block">Delete User</a>
                  </div>
              </div>
            </div><!-- ./col-sm-4 -->

            <div class="col-sm-8">

                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Date Joined</th>
                            <th>Followers</th>
                            <th>Following</th>
                            <th>Role</th>
                        </tr>
                        <tr>
                            <td><?=$user["id"];?><input type="hidden" name="userid" value="<?=$user["id"];?>"></td>
                            <td><?=$user["email"];?></td>
                            <td><?=$user["datejoin"];?></td>
                            <td><?=countFollowersByUserID($user["id"]);?></td>
                            <td><?=countFollowingByUserID($user["id"]);?></td>
                            <td>
                                <select name="role">
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
                                <td>
                                    <!-- image preview area-->
                                    <img id="uploadPreview" style="display:none;width:100%;"/>
                                    <input type="file" id="uploadImage" accept="image/*" name="image">
                                    <!-- <input type="hidden" value="<?=$user["image"];?>" name="imageOld"> -->
                                    <img src="<?=$user["image"];?>" width="80">

                                    <!-- hidden inputs for crop -->
                                    <input type="hidden" id="x" name="x" />
                                    <input type="hidden" id="y" name="y" />
                                    <input type="hidden" id="w" name="w" />
                                    <input type="hidden" id="h" name="h" />
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" value="<?=$user["name"];?>" name="name"></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><input type="text" value="<?=$user["description"];?>" name="desc"></td>
                            </tr>
                            <tr>
                                <th>Affliate</th>
                                <td><?=$user["affliate"];?></td>
                            </tr>
                        </table>
                    </div><!-- END user details-->
                </form>

                <div class="panel panel-default summary-panel">
                    <div class="panel-heading">All Post (<?php echo countPostByUserID($userid); ?>)</div>
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
                            <td><?= countPostLikes($post["id"]); ?></td>
                            <td><?= countCommentsByPostID($post["id"]); ?></td>
                            <td><a href="postDetails?postID=<?=$post["id"];?>" class="admin-sec-color">View</a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div><!-- END top 10 post today-->

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
