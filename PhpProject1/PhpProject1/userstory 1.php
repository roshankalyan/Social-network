<?php

  require_once '/home/k1116774/www/public_html/PhpProject1/vendor/facebook/php-sdk-v4/src/Facebook/autoload.php';
  

 session_start();

  $fb = new Facebook\Facebook([
  'app_id' => '//',
  'app_secret' => '//',
  'default_graph_version' => 'v2.5',
]);
  
  
try {
   
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,television', $_SESSION['facebook_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

//echo 'Name: ' . $user['name']."<br>";
//echo 'television'.$user['television'];
echo 'list of TV shows liked on facebook<br>';

$data  = $user['television'];

foreach ($data as $key){
    
    echo '<a href="http://www.facebook.com/'.$key['id'].'">'. $key['name']."<a/>";
    
    echo "<br>";
    
}