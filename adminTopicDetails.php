<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<?php
  redirectToLogin($_SESSION["role"], "admin");
  $topicID = $_GET["topicID"];
  $topic = getTopicByID($topicID);
?>

<html lang="en">
    <?php head("Dear Carrie - Admin Topic Details"); ?>
    <!-- <link rel="stylesheet" type="text/css" href="css/imgareaselect-animated.css" /> -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/jquery.imgareaselect.pack.js"></script> -->
    <script type="text/javascript" src="js/script.js"></script>
  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li><a href="topicList">Topics</a></li>
            <li class="active"><?=$topic["title"];?></li>
        </ol>

        <div class="row">
            <form action="editTopicProcess" method="post" class="editable-fields" enctype="multipart/form-data">
                <div class="col-sm-4 hide-mobile">
                  <div class="panel panel-default actionBar">
                      <div class="panel-heading">Actions</div>
                      <div class="panel-body">
                          <a href="topicDetails?topicID=<?=$topic["id"];?>" class="btn btn-default btn-block">Go to Topic</a>
                          <hr/>
                          <button name="action" value="update" class="btn btn-primary btn-block" type="submit">Update Topic</a>
                          <?php if ($topic["published"]) { ?>
                          <button name="action" value="unpublish" class="btn btn-danger btn-block" type="submit">Unpublish Topic</a>
                          <?php } else { ?>
                            <button name="action" value="publish" class="btn btn-success btn-block" type="submit">Publish Topic</a>
                          <?php } ?>
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
                            <td><?=$topic["id"];?><input type="hidden" name="topicid" value="<?=$topic["id"];?>"></td>
                            <td><?= countFollowersByTopicID($topic["id"]); ?></td>
                            <td><?= countPostByTopicID($topic["id"]); ?></td>
                            <td><?=$topic["score"];?></td>
                        </tr>
                    </table>

                    <table class="table table-bordered">
                        <tr>
                            <th>Type</th>
                            <td>
                                <select name="type">
                                    <option <?php if($topic["type"]=="featured") echo "selected" ?> value="featured">Featured</option>
                                    <option <?php if($topic["type"]=="curated") echo "selected" ?> value="curated">Curated</option>
                                    <option <?php if($topic["type"]=="main") echo "selected" ?> value="main">Main</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Order</th>
                            <td><input name="order" type="text" value="<?=$topic["order_num"];?>"></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                        </tr>
                        <tr>
                            <td><input name="title" type="text" value="<?=$topic["title"];?>"></td>
                        </tr>
                        <tr>
                            <th>Main Image</th>
                        </tr>
                        <tr>
                            <td>
                                <!-- image preview area-->
                                <img id="uploadPreview" style="display:none;"/>
                                <input type="file" name="main" id="uploadImage" accept="image/jpeg">
                                <input type="hidden" name="main_image_old" value="<?=$topic["main_image"];?>">
                                <img src="<?=$topic["main_image"];?>" class="img-responsive">
                                <!-- hidden inputs for crop -->
                                <input type="hidden" id="x" name="x" />
                                <input type="hidden" id="y" name="y" />
                                <input type="hidden" id="w" name="w" />
                                <input type="hidden" id="h" name="h" />
                            </td>
                        </tr>
                        <tr>
                            <th>Background Image</th>
                        </tr>
                        <tr>
                            <td>
                                <!-- image preview area-->
                                <img id="uploadPreview2" style="display:none;"/>
                                <input type="file" name="background" id="uploadImage2" accept="image/jpeg">
                                <input type="hidden" name="background_old" value="<?=$topic["background"];?>">
                                <img src="<?=$topic["background"];?>" class="img-responsive">
                                <!-- hidden inputs for crop -->
                                <input type="hidden" id="x2" name="x2" />
                                <input type="hidden" id="y2" name="y2" />
                                <input type="hidden" id="w2" name="w2" />
                                <input type="hidden" id="h2" name="h2" />
                            </td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                        </tr>
                        <tr>
                            <td>
                              <input name="short_desc" type="text" value="<?=$topic["short_desc"];?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>
                              <textarea name="desc" rows="5"><?=$topic["description"];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>URL</th>
                        </tr>
                        <tr>
                            <td><input name="url" type="text" value="<?=$topic["url"];?>"></td>
                        </tr>
                        <tr>
                            <th>Tel</th>
                        </tr>
                        <tr>
                            <td><input name="tel" type="text" value="<?=$topic["tel"];?>"></td>
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
