<!DOCTYPE html>
<?php
  include('controllers/templates.php');
  $userID = $_GET["userID"];
  $user = getUserByID($userID);
  redirectNonUsers();
  goBackIfNotEqual($_SESSION["userid"], $userID);
  $errorMsg = $_GET["msg"];
?>

<html lang="en">
  <?php head("Edit Profile"); ?>

  <body>
    <?= navbar(); ?>
    <div class="page-container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading"><h4>Edit Profile</h4></div>
            <div class="panel-body">
              <form action="editProfileProcess" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input name="userid" type="hidden" value="<?=$user["id"];?>">
                  <label for="name">Image</label>
                  <input type="file" name="imageNew">
                  <input type="hidden" name="imageOld">
                  <img src="<?=$user["image"];?>" width="80">
                  <input name="image" type="hidden" value="<?=$user["image"];?>">
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="name" value="<?=$user["name"];?>">
                </div>
                <div class="form-group">
                  <label for="desc">Description</label>
                  <textarea name="desc" id="desc" class="form-control" rows="5"><?=$user["description"];?></textarea>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?=$user["email"];?>">
                </div>
                <button class="primary-line-btn" type="submit">Update</button>
              </form>
            </div>
          </div>

          <div class="panel panel-default">
              <div class="panel-heading"><h4>Password</h4></div>
              <div class="panel-body">
                  <div class="alert alert-danger alert-dismissable fade in" id="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <p id="errorMsg"></p>
                  </div>
                  <?php
                      if(!ifEmpty($errorMsg)) {
                          errorAlert($errorMsg);
                      }
                  ?>
                  <form id="pwForm" method="post" action="editPasswordProcess" name="pwForm">
                      <div class="form-group">
                          <label>Old Password</label>
                          <input name="password_old" type="password" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>New Password</label>
                          <input name="password_new" type="password" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Confirm New Password</label>
                          <input name="password_confirm" type="password" class="form-control">
                      </div>
                      <button class="primary-line-btn" type="submit">Change Password</button>
                  </form>
              </div>
          </div>
        </div>
      </div><!-- ./row -->

    </div>

    <?= footer(); ?>
  </body>

    <script>
    $("#alert").hide();

    $('#pwForm').submit(function() {
      //set variables
      var oldpw = document.forms["pwForm"]["password_old"].value;
      var newpw = document.forms["pwForm"]["password_new"].value;
      var cfmpw = document.forms["pwForm"]["password_confirm"].value;
      var validation = true;
      var msg = "";

      if (oldpw == null || oldpw == "") {
        validation = false;
        msg += "Please fill up your current password. ";
      }

      //check if new password is correct
      if (newpw != cfmpw || newpw  == null || newpw == "") {
        validation = false;
        msg += "Please make sure your new password is the same for both fields";
      }

      if (!validation) {
        document.getElementById("errorMsg").innerHTML = msg;
        $(".alert").show();
      }

      return validation;
    });
    </script>

</html>
