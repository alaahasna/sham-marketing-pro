<?php
session_start();
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
FacebookSession::setDefaultApplication( '2063195650619838','a0e60f849b7d082ca5eac51e7eedb2a6' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://syweb.co/S.S.P/fb/fbconfig.php' );
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
  $request = new FacebookRequest( $session, 'GET', '/me?locale=en_US&fields=first_name,last_name,email');
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfirst_name = $graphObject->getProperty('first_name'); // To Get first name
 	    $fblast_name = $graphObject->getProperty('last_name'); // To Get last name
	    $femail = $graphObject->getProperty('email');    // To Get email ID

        $select_users = @mysql_query("select id from users where social_media_id='".$fbid."'") or die(mysql_error());
        $num_users = @mysql_fetch_assoc($select_users);

        if($num_users == 0){
          $add_user = @mysql_query("insert into users
          (first_name,last_name,password,address,email,phone,register_date,register_by,social_media_id)
          values
          ('".$fbfirst_name."','".$fblast_name."','','','','',NOW(),'Facebook','".$fbid."')") or die(mysql_error());

          //Login after sign up
          $select_user_id = @mysql_query("select id from users where social_media_id='".$fbid."'") or die(mysql_error());
          $user_id = @mysql_fetch_assoc($select_user_id);
          $_SESSION['US_id'] = $user_id['id'];
          $_SESSION['US_test'] = md5($user_id['id']."_");
        }else{
          //Login after sign up
          $select_user_id = @mysql_query("select id,email from users where social_media_id='".$fbid."'") or die(mysql_error());
          $user_id = @mysql_fetch_assoc($select_user_id);
          $_SESSION['US_id'] = $user_id['id'];
          $_SESSION['US_test'] = md5($user_id['id']."_".$user_id['email']);
        }
    /* ---- header location after session ----*/

    // Get the base class GraphObject from the response
$object = $response->getGraphObject();

  header("Location: ../index.php");
} else {
$loginUrl = $helper->getLoginUrl(array(
'scope' => 'email'
));
header("Location: ".$loginUrl);
}
?>