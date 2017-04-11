<?php
session_start();
include("controllers/config.php");

require_once 'src/Facebook/autoload.php';


// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook as FacebookSDK;

/*
 * Configuration and setup Facebook SDK
 */
$appId      = '369194556763501'; //Facebook App ID
$appSecret    = '8587548e0a7148a79412da64f8a600f8'; //Facebook App Secret
$permissions  = array('email');  //Optional permissions

$fb = new Facebook([
  'app_id' => $appId,
  'app_secret' => $appSecret,
  'default_graph_version' => 'v2.8',
  'persistent_data_handler'=>'session'
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://jessdesigntan.com/fyp/fbconfig.php', $permissions);
foreach ($_SESSION as $k=>$v) {                    
    if(strpos($k, "FBRLH_")!==FALSE) {
        if(!setcookie($k, $v)) {
            //what??
        } else {
            $_COOKIE[$k]=$v;
        }
    }
}

?>

<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>
<?php
  $errorMsg = $_GET["msg"];
  redirectUsers();
?>

<html lang="en">
  <?php head("Dear Carrie - Login"); ?>

  <body>
    <?= navbar(); ?>

    <?php if (isset($_SESSION['FBID'])):  header("Location: /fyp");?>      <!--  After user login  -->

    <?php else: ?>     <!-- Before login -->
    <div class="page-container">
        <div class="small-wrapper">
          <img src="images/logo-long.svg" class="logo">
          <div class="title">Welcome back</div>
          <?php
              if(!ifEmpty($errorMsg)) {
                  errorAlert($errorMsg);
              }
          ?>
          <form action="loginProcess" method="post">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
              </div>
              <a href="forgetPassword" style="float:left;">Forget Password?</a><br /><br />
              <button type="submit" class="primary-line-btn">Login</button>
          </form>
          <hr/>
          <a class="facebook-btn" href="fbconfig.php">
              <img src="images/facebookIcon.png" width="10"/>
              <div class="text">Login with Facebook</div>
          </a>
          <hr/>
          <a href="signup" class="primary-color"><center>No account yet? Sign up here.</center></a>
        </div>
    </div><!-- END page-container -->

    <?= footer(); ?>
    <?php endif ?>
  </body>
</html>
