<?php
if(!session_id()) {
    session_start();
}
include('controllers/commonFunctions.php');
include("controllers/config.php");

$conn = connectToDataBase();

// Include the autoloader provided in the SDK
// require_once __DIR__ . '/facebook-php-sdk/autoload.php';
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

foreach ($_COOKIE as $k=>$v) {
    if(strpos($k, "FBRLH_")!==FALSE) {
        $_SESSION[$k]=$v;
    }
}

$fb = new Facebook([
  'app_id' => $appId,
  'app_secret' => $appSecret,
  'default_graph_version' => 'v2.8',
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  //exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  //exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  try {
    $response = $fb->get('/me?locale=en_US&fields=id,name,email',$accessToken);
    $userNode = $response->getGraphUser();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    //exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    //exit;
  }

  //echo 'Logged in as ' . $userNode->getName() . ' - ' . $userNode->getId() . ' - ' . $userNode->getEmail() . '<br />';
  //print_r($_SESSION['facebook_access_token']);

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
  $_SESSION['FBID'] = $userNode->getId();
  $_SESSION['FULLNAME'] = $userNode->getName();
  $_SESSION['EMAIL'] =  $userNode->getEmail();

  //begin to get photo from facebook account
  // $url = 'http://graph.facebook.com/' . $userNode->getId() . '/picture?type=large';
  // $ch = curl_init();
  // curl_setopt ($ch, CURLOPT_URL, $url);
  // curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
  // $data = curl_exec($ch);
  // curl_close($ch);
  // $fileName = 'images/profile/'.$userNode->getId().'.jpg';
  // $file = fopen($fileName, 'w+');
  // fputs($file, $data);
  // fclose($file);
  // //end to get photo from facebook account

  //fb image using direct url
  $fbImage = 'http://graph.facebook.com/'.$userNode->getId().'/picture?type=large';

  //begin get exist user ?
  $femail = $userNode->getEmail();
  $idfb = $userNode->getId();
  $namefb = $userNode->getName();
  $sql = "SELECT * FROM users WHERE email = '$femail' or email = '$idfb'";
  $result = $conn->query($sql);
  $value = $result->fetch_assoc();

  validateQuery($conn, $sql);
  //end get exist user ?

  if ($value["email"] == ""){
    $myPass = randomPassword();

    $hashPassword = md5($myPass);
    //save to table user for new user
    if ($femail == ""){
      $sqls = "INSERT INTO users (name, email, password, affliate, image)
    VALUES ('$namefb', '$idfb', '$hashPassword', 'facebook', '$fbImage')";
    }else{
      $sqls = "INSERT INTO users (name, email, password, affliate, image)
    VALUES ('$namefb', '$femail', '$hashPassword', 'facebook', '$fbImage')";
    }

    validateQuery($conn, $sqls);

    //begin to get new facebook user from table user
    $myFbUser = "SELECT * FROM users WHERE email = '$femail' or email = '$idfb'";
    $resultFb = $conn->query($myFbUser);
    $myFb = $resultFb->fetch_assoc();

    validateQuery($conn, $myFbUser);
    //end to get new facebook user from table user

    $_SESSION["userid"] = $myFb["id"];
    $_SESSION["email"] = $myFb["email"];
    $_SESSION["role"] = $myFb["role"];
    $_SESSION["name"] = strtok($myFb["name"], " "); //get first word of the name
  }else{
    $_SESSION["userid"] = $value["id"];
    $_SESSION["email"] = $value["email"];
    $_SESSION["role"] = $value["role"];
    $_SESSION["name"] = strtok($value["name"], " "); //get first word of the name
  }
  

  header("Location: index.php");

}else{
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl('http://jessdesigntan.com/fyp/fbconfig.php', $permissions);
  header("Location: ".$loginUrl);
}

session_write_close();

?>
