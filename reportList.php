<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  redirectToLogin($_SESSION["role"], "admin");
  $reports = displayAllReports();
?>
<html lang="en">
  <?php head("Dear Carrie - Admin Report List"); ?>
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
            <li class="active"><a href="#">Report</a></li>
        </ol>
        <table id="report-list" class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Report ID</th>
                    <th>Date</th>
                    <th>User ID</th>
                    <th>Type</th>
                    <th>Item ID</th>
                    <th>Comment</th>
                    <th>Seen</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($reports as $report) { ?>
                <tr>
                    <td><?=$report["id"];?></td>
                    <td><?=$report["date"];?></td>
                    <td><?=$report["userid"];?></td>
                    <td><?=$report["type"];?></td>
                    <td><?=$report["itemid"];?></td>
                    <td><?=$report["comment"];?></td>
                    <td><?=$report["seen"];?></td>
                    <td><a href="reportDetails?reportID=<?=$report["id"];?>" class="admin-sec-color">View</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div><!-- ./page-container -->

    <?php footer(); ?>
    <script>
        $("#reportNav").addClass("active");

        $('#report-list').DataTable( {
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
