<?php
  require_once '/home/k1116774/www/public_html/PhpProject1/vendor/facebook/php-sdk-v4/src/Facebook/autoload.php';
  

 session_start();

  $fb = new Facebook\Facebook([
  'app_id' => '//',
  'app_secret' => '//',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
       echo '<a href="http://kunet.kingston.ac.uk/k1116774//public_html/PhpProject1/userstory 1.php">User story 1: view list of tv shows from facebook </a><br>';
       echo '<a href="http://kunet.kingston.ac.uk/k1116774//public_html/PhpProject1/userstory 2.php">User story 2: view list of tv shows from kodi </a><br>';
       echo '<a href="http://kunet.kingston.ac.uk/k1116774//public_html/PhpProject1/userstory 3.php">User story 3: view list of tv shows from kodi and facebook compared </a><br>';
       echo '<a href="http://kunet.kingston.ac.uk/k1116774//public_html/PhpProject1/userstory 4.php">User story 4: view list of tv shows from kodi and facebook compared with like boxes </a><br>';
       echo '<a href="http://kunet.kingston.ac.uk/k1116774//public_html/PhpProject1/database.php">User story 5: view list of tv shows from kodi and facebook compared with like boxes and option to post </a><br>';


     echo '<a href="http://kunet.kingston.ac.uk/k1116774//public_html/PhpProject1/search.php">search Application</a>';
}
?>