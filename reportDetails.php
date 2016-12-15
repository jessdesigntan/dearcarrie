<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $reportID = $_GET["reportID"];
  $report = getReportByID($reportID);
?>
<html lang="en">
  <?php head("Dear Carrie - Admin Report Details"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="reportList">Report</a></li>
            <li class="active"><a href="#"><?=$report["id"];?></a></li>
        </ol>

        <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-default actionBar hide-mobile">
                  <div class="panel-heading">Actions</div>
                  <div class="panel-body">
                      <p>Status</p>
                      <h4>
                      <?php
                        $status = ($report["seen"] == 1 ? "Resolved" : "Not Resolved");
                        echo $status;
                      ?>
                      </h4>
                      <form action="updateReportStatus" method="post">
                          <input type="hidden" name="reportid" value="<?=$report["id"];?>">
                          <?php if ($report["seen"]) { ?>
                            <button name="action" type="submit" value="unsolve" class="btn btn-danger btn-block">Change to Unresolved</button>
                          <?php } else { //status = 0, havent resolved, change to resolve ?>
                            <button name="action" type="submit" value="resolve" class="btn btn-success btn-block">Change to Resolved</button>
                          <?php } ?>
                      </form>
                  </div>
              </div>
            </div><!-- ./col-sm-4 -->

            <div class="col-sm-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Report ID</th>
                        <th>Reporter ID</th>
                        <th>Item ID</th>
                        <th>Type</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td><?=$report["id"];?></td>
                        <td><a href="#"><?=$report["userid"];?></a></td>
                        <?php if($report["type"] == "post") { ?>
                            <td><a href="postDetails?postID=<?=$report['itemid'];?>"><?=$report["itemid"];?></a></td>
                        <?php } else { ?>
                            <td><a href="commentDetails?commentID=<?=$report['itemid'];?>"><?=$report["itemid"];?></a></td>
                        <?php } ?>

                        <td><?=$report["type"];?></td>
                        <td><?=$report["date"];?></td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th>Reporter Comment</th>
                    </tr>
                    <tr>
                        <td><?=$report["comment"];?></td>
                    </tr>
                </table>

                <table class="table table-bordered">

                    <?php
                    if($report["type"] == "post") {
                    $post = getPostByID($report["itemid"]);
                    ?>
                    <tr>
                        <th>Post Title</th>
                    </tr>
                    <tr>
                          <td><?=$post["title"];?></td>
                    </tr>
                    <tr>
                        <th>Post Description</th>
                    </tr>
                    <tr>
                          <td><?=$post["description"];?></td>
                    </tr>
                    <?php
                    } else {
                      $comment = getCommentByID($report["itemid"]);
                    ?>
                    <tr>
                        <th>Comment Content</th>
                    </tr>
                    <tr>
                          <td><?=$comment["comment"];?></td>
                    </tr>
                    <?php } ?>
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
