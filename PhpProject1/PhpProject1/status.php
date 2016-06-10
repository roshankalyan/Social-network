<?php


require_once '/home/k1116774/www/public_html/PhpProject1/vendor/facebook/php-sdk-v4/src/Facebook/autoload.php';
session_start();
$fb = new Facebook\Facebook([
    'app_id' => '//',
    'app_secret' => '//',
    'default_graph_version' => 'v2.5',
        ]);

$fbApp = new Facebook\FacebookApp('//', '//');
$request = new Facebook\FacebookRequest($fbApp,  $_SESSION['facebook_access_token'], 'POST', '/me/feed',
  array (
    'message' => 'This is a test message',
  ));


// Send the request to Graph
try {
  $response = $fb->getClient()->sendRequest($request);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

//$graphNode = $response->getGraphNode();

//echo 'User name: ' . $graphNode['name'];