<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>workshop 4</title>
    </head>
    <body>
        <?php
        session_start();
     $facebookappinfomation = "//";
        require_once '/home/k1116774/www/public_html/PhpProject1/vendor/facebook/php-sdk-v4/src/Facebook/autoload.php';
        $fb = new Facebook\Facebook([
  'app_id' => '//',
  'app_secret' => '//',
  'default_graph_version' => 'v2.5',
]);
    

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email',
  'user_location',
  'user_birthday',
  'publish_actions',
  'publish_pages',
  'manage_pages',
  'public_profile',]; // optional
$loginUrl = $helper->getLoginUrl('http://kunet.kingston.ac.uk/k1116774/public_html/PhpProject1/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a><br><h4>app_id= '.$facebookappinfomation.'</h4>';
        
        
        
        
        ?>
    </body>
</html>
