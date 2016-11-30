<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<?php redirectToLogin($_SESSION["role"], "admin"); ?>
<html lang="en">
  <?php head("Dear Carrie - Admin Post Details"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="postList">Post</a></li>
            <li class="active"><a href="#">Post Title . . .</a></li>
        </ol>

        <div class="row">
            <form method="post" class="editable-fields">
                <div class="col-sm-4">
                  <div class="panel panel-default actionBar hide-mobile">
                      <div class="panel-heading">Actions</div>
                      <div class="panel-body">
                          <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#topicModal">Edit Topic</a>
                          <hr/>
                          <a class="btn btn-primary btn-block">Update Post</a>
                          <a class="btn btn-danger btn-block">Delete Post</a>
                          <hr/>
                          <a href="post" class="btn btn-default btn-block">Go to post</a>
                          <hr/>
                          <p>No. of reports</p>
                          <h4 class="primary-color">3</h4>
                      </div>
                  </div>
                </div><!-- ./col-sm-4 -->

                <div class="col-sm-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>Post ID</th>
                            <th>User ID</th>
                            <th>Date</th>
                            <th>Likes</th>
                            <th>Comments</th>
                        </tr>
                        <tr>
                            <td>12312312</td>
                            <td><a href="userDetails">56456</a></td>
                            <td>12 Jan 2016</td>
                            <td>76</td>
                            <td>300</td>
                        </tr>
                    </table>

                    <div class="panel panel-default summary-panel mBottom-40">
                        <table class="table table-bordered">
                            <tr>
                                <th>Title</th>
                            </tr>
                            <tr>
                                <td><input type="text" value="Why I am so depressed"></td>
                            </tr>
                            <tr>
                                <th>Topics</th>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#topicDetails"><span class="label label-success">Bipolar</span></a>
                                    <a href="#topicDetails"><span class="label label-primary">Love & Relationships</span></a>
                                    <br/><br/><a class="light-text" data-toggle="modal" data-target="#topicModal">Add Topic </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Content</th>
                            </tr>
                            <tr>
                                <td>
                                  <textarea rows="10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                                  </textarea>
                                </td>
                            </tr>
                        </table>
                    </div><!-- END user details-->

                    <div class="panel panel-default summary-panel">
                        <div class="panel-heading">All Reports (3)</div>
                        <table class="table table-hover table-bordered table-striped">
                            <tr>
                                <th>User ID</th>
                                <th>Date</th>
                                <th>Comments</th>
                            </tr>
                            <?php for ($i=1; $i<=3; $i++) { ?>
                            <tr>
                                <td><a href="userDetails" class="admin-sec-color">123123</a></td>
                                <td>12 Jan 2016</td>
                                <td><a href="commentDetails">I dont like this post, it is offensive</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div><!-- END top 10 post today-->

                    <div class="panel panel-default summary-panel">
                        <div class="panel-heading">All Comment (342)</div>
                        <table class="table table-hover table-bordered table-striped">
                            <tr>
                                <th>User ID</th>
                                <th>Date</th>
                                <th>Comment</th>
                            </tr>
                            <?php for ($i=1; $i<=10; $i++) { ?>
                            <tr>
                                <td><a href="userDetails" class="admin-sec-color">123123</a></td>
                                <td>12 Jan 2016</td>
                                <td><a href="commentDetails">Great Post!</a></td>
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
    <?php topicModal(); ?>
    <script>
        $("#usersNav").addClass("active");
        staticBar('.actionBar','120');
    </script>
  </body>

</html>
