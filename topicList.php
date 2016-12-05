<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $topics = displayAllTopics();
?>
<html lang="en">
  <?php head("Dear Carrie - Admin Topic List"); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.12/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.12/datatables.min.js"></script>
  <style>
  /* hard overwrite */
  .form-control {
    height: 30px !important;
    border-radius: 0;
    letter-spacing: 1px;
    margin: 0 5px;
  }
  </style>

  <body>
    <?= navbar(); ?>
    <?= adminNav(); ?>

    <div class="page-container-admin">
        <ol class="breadcrumb">
            <li><a href="dashboard">Dashboard</a></li>
            <li class="active"><a href="#">Topics</a></li>
        </ol>
        <div class="row col-sm-12">
            <a href="addTopic" class="btn btn-primary" style="color:white;" >Add Topic</a>
            <hr/>
        </div>
        <table id="topic-list" class="table table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th>Date</th>
                <th>Topic ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Followers</th>
                <th>Post</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <?php
              foreach ($topics as $topic) {
                $postCount = countPostByTopicID($topic["id"]);
            ?>
            <tr>
                <td><?=$topic["date"];?></td>
                <td><?=$topic["id"];?></td>
                <!-- remember to do a substring function to keep the text to one line -->
                <td><?=$topic["title"];?></td>
                <td>
                    <?php if ($topic["type"] == "featured") {?>
                      <span class="label label-warning"><?=$topic["type"];?></span>
                    <?php } else if($topic["type"] == "curated") { ?>
                      <span class="label label-success"><?=$topic["type"];?></span>
                    <?php } else { ?>
                      <span class="label label-primary"><?=$topic["type"];?></span>
                    <?php } ?>
                </td>
                <td><?=$topic["followers"];?></td>
                <td><?=$postCount;?></td>
                <td><a href="adminTopicDetails?topicID=<?=$topic["id"];?>" class="admin-sec-color">View</a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div><!-- ./page-container -->

    <?php footer(); ?>
    <script>
        $("#topicsNav").addClass("active");
        $('#topic-list').DataTable( {
                columnDefs: [ {
                    targets: [ 0 ],
                    orderData: [ 0, 1 ]
                }, {
                    targets: [ 1 ],
                    orderData: [ 1, 0 ]
                }, {
                    targets: [ 4 ],
                    orderData: [ 4, 0 ]
                } ]
            } );
    </script>
  </body>

</html>
