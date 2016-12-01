<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<?php
  redirectToLogin($_SESSION["role"], "admin");
  $topicID = $_GET["topicID"];
  $topic = getTopicByID($topicID);
?>

<html lang="en">
  <?php head("Dear Carrie - Admin Topic Details"); ?>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="topicList">Topics</a></li>
            <li class="active"><?=$topic["name"];?></li>
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
                            <td><?=$topic["id"];?></td>
                            <td><?=$topic["followers"];?></td>
                            <td><?=$topic["posts"];?></td>
                            <td><?=$topic["score"];?></td>
                        </tr>
                    </table>

                    <table class="table table-bordered">
                        <tr>
                            <th>Type</th>
                            <td>
                                <select>
                                    <option <?php if($topic["type"]=="featured") echo "selected" ?> value="featured">Featured</option>
                                    <option <?php if($topic["type"]=="curated") echo "selected" ?> value="curated">Curated</option>
                                    <option <?php if($topic["type"]=="main") echo "selected" ?> value="main">Main</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Order</th>
                            <td><input type="text" value="<?=$topic["order_num"];?>"></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                        </tr>
                        <tr>
                            <td><input type="text" value="<?=$topic["title"];?>"></td>
                        </tr>
                        <tr>
                            <th>Main Image</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="file">
                                <img src="<?=$topic["main_image"];?>" class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <th>Background Image</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="file">
                                <img src="<?=$topic["background"];?>" class="img-responsive">
                            </td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                        </tr>
                        <tr>
                            <td>
                              <input type="text" value="<?=$topic["short_desc"];?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>
                              <textarea rows="5"><?=$topic["description"];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>URL</th>
                        </tr>
                        <tr>
                            <td><input type="text" value="<?=$topic["url"];?>"></td>
                        </tr>
                        <tr>
                            <th>Tel</th>
                        </tr>
                        <tr>
                            <td><input type="text" value="<?=$topic["tel"];?>"></td>
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
