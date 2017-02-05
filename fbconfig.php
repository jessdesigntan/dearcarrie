<?php
include('controllers/commonFunctions.php');
include("controllers/config.php");

session_start();
$conn = connectToDataBase();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '369194556763501','8587548e0a7148a79412da64f8a600f8' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper($facebookUrl);
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?locale=en_US&fields=id,name,email' ); //grab name, id, and especially for email from fb account
  $response = $request->execute();
  // print_r($response);
  // get response
  $graphObject = $response->getGraphObject();
 	$fbid = $graphObject->getProperty('id');          // To Get Facebook ID
  $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
  $femail = $graphObject->getProperty('email');    // To Get Facebook email ID

  //echo $fbid;exit();
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;
      $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
    /* ---- header location after session ----*/

    //begin to get photo from facebook account
    /*
    $url = 'http://graph.facebook.com/' . $fbid . '/picture?type=large';
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    $fileName = 'images/profile/'.$fbid.'.jpg';
    $file = fopen($fileName, 'w+');
    fputs($file, $data);
    fclose($file);
    //end to get photo from facebook account
    */

    //fb image using direct url
    $fbImage = 'http://graph.facebook.com/'.$fbid.'/picture?type=large';

    //begin get exist user ?
    $email = $femail;
    $sql = "SELECT * FROM users WHERE email = '$email' or email = '$fbid'";
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
      VALUES ('$fbfullname', '$fbid', '$hashPassword', 'facebook', '$fbImage')";
      }else{
        $sqls = "INSERT INTO users (name, email, password, affliate, image)
      VALUES ('$fbfullname', '$femail', '$hashPassword', 'facebook', '$fbImage')";
      }

      validateQuery($conn, $sqls);

      //begin to get new facebook user from table user
      $myFbUser = "SELECT * FROM users WHERE email = '$femail' or email = '$fbid'";
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
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>
