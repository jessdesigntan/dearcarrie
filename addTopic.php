<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<?php redirectToLogin($_SESSION["role"], "admin"); ?>
<html lang="en">
  <?php head("Dear Carrie - Admin Add Topic"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="topicList">Topics</a></li>
            <li class="active">Add Topic</li>
        </ol>

        <div class="row">
            <form action="addTopicProcess" method="post" class="editable-fields" enctype="multipart/form-data">
                <div class="col-sm-4 hide-mobile pull-right">
                  <div class="panel panel-default actionBar">
                      <div class="panel-heading">Actions</div>
                      <div class="panel-body">
                          <button class="btn btn-primary btn-block" type="submit">Add Topic</a>
                      </div>
                  </div>
                </div><!-- ./col-sm-4 -->

                <div class="col-sm-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>Type</th>
                            <td>
                                <select name="type">
                                    <option value="curated">Choose one</option>
                                    <option value="curated">Curated</option>
                                    <option value="main">Main</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Order</th>
                            <td><input name="order" type="text" placeholder="order number"></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                        </tr>
                        <tr>
                            <td><input name="title" type="text" placeholder="Title"></td>
                        </tr>
                        <tr>
                            <th>Main Image</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="file" name="main">
                            </td>
                        </tr>
                        <tr>
                            <th>Background Image</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="file" name="background">
                            </td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                        </tr>
                        <tr>
                            <td>
                              <input name="short_desc" type="text" placeholder="Describe the topic in one line">
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>
                              <textarea name="desc" rows="5" placeholder="Describe the topic"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>URL</th>
                        </tr>
                        <tr>
                            <td><input name="url" type="text" placeholder="http://www.testing.com"></td>
                        </tr>
                        <tr>
                            <th>Tel</th>
                        </tr>
                        <tr>
                            <td><input name="tel" type="text" placeholder="+65 6777 5555"></td>
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
