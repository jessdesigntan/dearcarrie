<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Dear Carrie - Admin Topic Details"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="topicList">Topics</a></li>
            <li class="active">Love & Relationships</li>
        </ol>

        <div class="row">
            <form method="post" class="editable-fields">
                <div class="col-sm-4 hide-mobile">
                  <div class="panel panel-default actionBar">
                      <div class="panel-heading">Actions</div>
                      <div class="panel-body">
                          <a href="topicDetails" class="btn btn-default btn-block">Go to Topic</a>
                          <hr/>
                          <button class="btn btn-primary btn-block" type="button">Update Topic</a>
                          <button class="btn btn-danger btn-block" type="button">Delete Topic</a>
                      </div>
                  </div>
                </div><!-- ./col-sm-4 -->

                <div class="col-sm-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>Topic ID</th>
                            <th>Followers</th>
                            <th>Posts</th>
                            <th>Score</th>
                        </tr>
                        <tr>
                            <td>12312312</td>
                            <td>76</td>
                            <td>300</td>
                            <td>403</td>
                        </tr>
                    </table>

                    <table class="table table-bordered">
                        <tr>
                            <th>Type</th>
                            <td>
                                <select>
                                    <option>Featured</option>
                                    <option>Curated</option>
                                    <option>Main</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Order</th>
                            <td><input type="text" value="20"></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                        </tr>
                        <tr>
                            <td><input type="text" value="Love & Relationships"></td>
                        </tr>
                        <tr>
                            <th>Main Image</th>
                        </tr>
                        <tr>
                            <td>
                                <img src="images/love.jpg" class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <th>Background Image</th>
                        </tr>
                        <tr>
                            <td>
                                <img src="images/love.jpg" class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                        </tr>
                        <tr>
                            <td>
                              <input type="text" value="Short Stories">
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>
                              <textarea rows="5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>URL</th>
                        </tr>
                        <tr>
                            <td><input type="text" value="www.testing.com"></td>
                        </tr>
                        <tr>
                            <th>Tel</th>
                        </tr>
                        <tr>
                            <td><input type="text" value="6777 5555"></td>
                        </tr>
                    </table>
                </form>
            </div><!-- ./col-sm-8 -->
        </div><!-- ./row -->
    </div><!-- ./page-container -->

    <?php footer(); ?>
    <script>
        $("#topicsNav").addClass("active");
        staticBar('.actionBar','120');
    </script>
  </body>

</html>
