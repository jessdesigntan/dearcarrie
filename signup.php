<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Dear Carrie - Sign up"); ?>

  <body>
    <?= navbar(); ?>

    <div class="page-container">
        <div class="small-wrapper">
          <img src="images/logo-long.svg" class="logo">
          <div class="title">Sign up</div>

          <div class="alert alert-danger alert-dismissable fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <p id="errorMsg">Please fill up everything highlighted in red</p>
          </div>

          <form action="registerProcess" method="post" name="registerUser" id="registerForm">
              <div class="form-group">
                <label class="control-label">Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label class="control-label">Password</label>
                <input type="password" class="form-control" name="password1" required>
              </div>
              <div class="form-group">
                <label class="control-label">Confirm Password</label>
                <input type="password" class="form-control" name="password2" required>
              </div>
              <button type="submit" class="primary-line-btn" id="submitBtn">Sign up</button>
          </form>
          <hr/>
          <a class="facebook-btn" href="fbconfig.php">
              <img src="images/facebookIcon.png" width="10"/>
              <div class="text">Sign up with Facebook</div>
          </a>
          <hr/>
          <a href="login" class="primary-color"><center>Already signed up? Log in here.</center></a>
        </div>
    </div><!-- END page-container -->
    <?= footer(); ?>
  </body>

  <script>
  $(".alert").hide();

  $('#registerForm').submit(function() {
    //remove all previous class
    $(".form-group").removeClass("has-error");

    //set variables
    var name = document.forms["registerUser"]["name"].value;
    var email = document.forms["registerUser"]["email"].value;
    var pw1 = document.forms["registerUser"]["password1"].value;
    var pw2 = document.forms["registerUser"]["password2"].value;
    var validation = true;
    var msg = "Please fill up everything highlighted in red.<br/>";
    //validations
    if (name == null || name == "") {
      $(".form-group:first").addClass("has-error");
      validation = false;
    }

    if (email == null || email == "") {
      $(".form-group:nth-child(2)").addClass("has-error");
      validation = false;
    }

    if (pw1 != pw2 || pw1 == null || pw1 == "") {
      $(".form-group:nth-child(3)").addClass("has-error");

      msg += "Please make sure password is the same for both.";
      validation = false;
    }

    if (!validation) {
      document.getElementById("errorMsg").innerHTML = msg;
      $(".alert").show();
    }

    return validation;
  });
  </script>
</html>
