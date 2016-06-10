<?php
require_once '/home/k1116774/www/public_html/PhpProject1/vendor/facebook/php-sdk-v4/src/Facebook/autoload.php';
session_start();
$fb = new Facebook\Facebook([
    'app_id' => '//',
    'app_secret' => '//',
    'default_graph_version' => 'v2.5',
        ]);


//woody's
try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->get('108817125813077/?fields=id,name,phone,payment_options,hours', $_SESSION['facebook_access_token']);
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
   echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

$user = $response->getGraphUser();
$data = $user['payment_options'];
$hours = $user['hours'];
echo'id: ' . $user['id'];
echo '<br>Name: ' . $user['name'];
echo '<br>Phone#: ' . $user['phone'];
echo '<br> payment options: ';

echo var_dump($data);

foreach ($data as $key => $value) {
    
    if($value == 1)
    {
    echo $key." ";
    }
}
unset($value);
echo '<br>';

//echo var_dump($hours);

foreach ($hours as $key2 => $value) {
    
    echo $key2." ".$value."<br> ";
    
    if (strpos($key2, '2')=== true)
    {
        echo 'more than one opening time';
    }
    
    
}






/*
  //coconut
  try {
  // Returns a `Facebook\FacebookResponse` object
  $response2 = $fb->get('120737911314133/?fields=id,name,phone,payment_options', $_SESSION['facebook_access_token']);
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
  }
  $user2 = $response2->getGraphUser();

  echo'<br><br>id: '.$user2['id'];
  echo '<br>Name: ' . $user2['name'];
  echo '<br>Phone#: ' . $user2['phone'];
  echo '<br> hours open: '.$user2['payment_options'];


 */
?>

<h1></h1>