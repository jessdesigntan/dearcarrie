<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $commentID = $_GET["commentID"];
  $comment = getCommentByID($commentID);

?>
<html lang="en">
  <?php head("Dear Carrie - Admin Report Details"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="reportList">Comment</a></li>
            <li class="active"><a href="#">#<?=$commentID;?></a></li>
        </ol>

        <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-default actionBar hide-mobile">
                  <div class="panel-heading">Actions</div>
                  <div class="panel-body">
                      <p>Status</p>
                      <h4>
                      <?php
                        $status = ($comment["published"] == 1 ? "Published" : "Not Published");
                        echo $status;
                      ?>
                      </h4>
                      <form action="updateCommentStatus" method="post">
                          <input type="hidden" name="commentid" value="<?=$commentID;?>">
                          <?php if ($comment["published"]) { ?>
                            <button name="action" type="submit" value="unpublish" class="btn btn-danger btn-block">Unpublish</button>
                          <?php } else { //status = 0, havent resolved, change to resolve ?>
                            <button name="action" type="submit" value="publish" class="btn btn-success btn-block">Publish</button>
                          <?php } ?>
                      </form>
                  </div>
              </div>
            </div><!-- ./col-sm-4 -->

            <div class="col-sm-8">
                <table class="table table-bordered">
                    <tr>
                        <th>User ID</th>
                        <th>Post ID</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td><a href="userDetails?userID=<?=$comment['userid'];?>"><?=$comment["userid"];?></a></td>
                        <td><a href="postDetails?postID=<?=$comment['postid'];?>"><?=$comment["postid"];?></td>
                        <td><?=$comment["datetime"];?></td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th>Comment</th>
                    </tr>
                    <tr>
                        <td><?=$comment["comment"];?></td>
                    </tr>
                </table>
            </div><!-- ./col-sm-8 -->
        </div><!-- ./row -->
    </div><!-- ./page-container -->

    <?php footer(); ?>
    <script>
        $("#reportNav").addClass("active");
        staticBar('.actionBar','120');
    </script>
  </body>

</html>
