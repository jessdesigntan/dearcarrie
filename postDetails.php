<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<?php
  redirectToLogin($_SESSION["role"], "admin");
  $postID = $_GET["postID"];
  $post = getPostByID($postID);
  $topics = displayAllTopicsOrderByTitleAsc();
  $postTopics = getAllTopicsByPostID($postID);
  $reports = getAllReportsByPostID($postID);
  $comments = getAllCommentsByPostID($postID);
?>
<html lang="en">
  <?php head("Dear Carrie - Admin Post Details"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="postList">Post</a></li>
            <li class="active"><?=$post["title"];?></li>
        </ol>

        <div class="row">
            <form action="updatePostProcess" method="post" class="editable-fields">
                <div class="col-sm-4">
                  <div class="panel panel-default actionBar hide-mobile">
                      <div class="panel-heading">Actions</div>
                      <div class="panel-body">
                          <div id="postBtns">
                              <button name="action" value="update"  type="submit" class="btn btn-primary btn-block">Update Post</button>
                              <?php if ($post["published"]) { ?>
                                <button name="action" value="unpublish"  type="submit" class="btn btn-danger btn-block">Unpublish</button>
                              <?php } else { ?>
                                <button name="action" value="publish"  type="submit" class="btn btn-success btn-block">Publish</button>
                              <?php } ?>
                          </div>
                          <div id="topicBtns">
                              <button name="action" value="topic"  type="submit" class="btn btn-primary btn-block">Update Topic</button>
                          </div>
                          <hr/>
                          <a href="post?postID=<?=$post["id"];?>" class="btn btn-default btn-block">Go to post</a>
                          <hr/>
                          <p>No. of reports</p>
                          <h4 class="primary-color"><?=countReportsByPostID($postID);?></h4>
                      </div>
                  </div>
                </div><!-- ./col-sm-4 -->

                <div class="col-sm-8">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                      <div class="btn-group" role="group">
                        <button id="postLink" onclick="showPostDiv();" type="button" class="btn btn-default">Post</button>
                      </div>
                      <div class="btn-group" role="group">
                        <button id="topicLink" onclick="showTopicDiv();" type="button" class="btn btn-default">Topic</button>
                      </div>
                    </div>

                    <div id="topicDiv">
                        <div class="panel panel-default">
                            <div class="panel-heading">Topics</div>
                            <div class="panel-body">
                                <?php foreach($topics as $topic) { ?>
                                <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="topic[]" value="<?=$topic["id"];?>"
                                      <?php foreach($postTopics as $postTopic) {
                                              if ($postTopic["topicid"] == $topic["id"]) {
                                                echo "checked='checked'";
                                              }
                                            } ?>
                                      ><?=$topic["title"];?></label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <hr/>
                    </div>

                <div id="postDiv">
                    <table class="table table-bordered">
                        <tr>
                            <th>Post ID</th>
                            <th>User ID</th>
                            <th>Date</th>
                            <th>Likes</th>
                            <th>Comments</th>
                            <th>Published</th>
                        </tr>
                        <tr>
                            <td><?=$post["id"];?><input type="hidden" name="postid" value="<?=$post["id"];?>"></td>
                            <td><a href="userDetails?userID=<?=$post["userid"];?>"><?=$post["userid"];?></a></td>
                            <td><?=$post["timestamp"];?></td>
                            <td><?= countPostLikes($post["id"]); ?></td>
                            <td><?= countCommentsByPostID($post["id"]); ?></td>
                            <td><?php echo displayPubStatus($post["published"]);?></td>
                        </tr>
                    </table>

                    <div class="panel panel-default summary-panel mBottom-40">
                        <table class="table table-bordered">
                            <tr>
                                <th>Title</th>
                            </tr>
                            <tr>
                                <td><input name="title" type="text" value="<?=$post["title"];?>"></td>
                            </tr>
                            <tr>
                                <th>Content</th>
                            </tr>
                            <tr>
                                <td>
                                  <textarea name="desc" rows="10"><?=$post["description"];?></textarea>
                                </td>
                            </tr>
                        </table>
                    </div><!-- END user details-->

                    <div class="panel panel-default summary-panel">
                        <div class="panel-heading">All Reports (<?=countReportsByPostID($postID);?>)</div>
                        <table class="table table-hover table-bordered table-striped">
                            <tr>
                                <th>User ID</th>
                                <th>Date</th>
                                <th>Comments</th>
                            </tr>
                            <?php foreach ($reports as $report) { ?>
                            <tr>
                                <td><a href="userDetails" class="admin-sec-color"><?=$report["userid"];?></a></td>
                                <td><?=$report["date"];?></td>
                                <td><a href="reportDetails?reportID=<?=$report["id"];?>"><?=$report["comment"];?></a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div><!-- END top 10 post today-->

                    <div class="panel panel-default summary-panel">
                        <div class="panel-heading">All Comments (<?=countCommentsByPostID($postID);?>)</div>
                        <table class="table table-hover table-bordered table-striped">
                            <tr>
                                <th>User ID</th>
                                <th>Date</th>
                                <th>Comment</th>
                            </tr>
                            <?php foreach ($comments as $comment) { ?>
                            <tr>
                                <td><a href="userDetails" class="admin-sec-color"><?=$comment["userid"];?></a></td>
                                <td><?=$comment["datetime"];?></td>
                                <td><a href="commentDetails?commentID=<?=$comment["id"];?>"><?=$comment["comment"];?></a></td>
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
            </form>
        </div><!-- ./row -->
    </div><!-- ./page-container -->

    <?php footer(); ?>
    <script>
        $("#usersNav").addClass("active");
        $("#postLink").addClass("active");
        $("#topicDiv").hide();
        $("#topicBtns").hide();
        staticBar('.actionBar','120');

        function showTopicDiv() {
          $("#topicLink").addClass("active");
          $("#postLink").removeClass("active");
          $("#topicDiv").fadeIn();
          $("#postDiv").hide();
          $("#postBtns").hide();
          $("#topicBtns").show();
        }

        function showPostDiv() {
          $("#postLink").addClass("active");
          $("#topicLink").removeClass("active");
          $("#postDiv").fadeIn();
          $("#topicDiv").hide();
          $("#postBtns").show();
          $("#topicBtns").hide();
        }
    </script>
  </body>

</html>
