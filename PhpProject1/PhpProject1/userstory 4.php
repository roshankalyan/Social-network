<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1561718520818901";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script src="http://connect.facebook.net/en_US/all.js" type="text/javascript"></script>



<?php
error_reporting(E_ERROR | E_PARSE);
require_once '/home/k1116774/www/public_html/PhpProject1/vendor/facebook/php-sdk-v4/src/Facebook/autoload.php';


session_start();

$fb = new Facebook\Facebook([
    'app_id' => '//',
    'app_secret' => '//',
    'default_graph_version' => 'v2.5',
        ]);



$servername = "kunet.kingston.ac.uk";
$username = "k1116774";
$password = "bane0of0god";
$dbname = "db_k1116774";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

echo "The following shows are ones you have not yet liked <br>";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";



$sql = "SELECT c00,c14 FROM `tvshow` ORDER BY `idShow`";

$result = $conn->query($sql);

try {

    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->get('/me?fields=id,name,television', $_SESSION['facebook_access_token']);
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

$user = $response->getGraphUser();
$data = $user['television'];
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $q = $row["c00"];
        $p = str_replace(" ", "+", $q);
        $int = 1;
        $value;


// type can be user, group, page or event
        $search = $fb->get('/search?q=' . $p . '&type=page.', $_SESSION['facebook_access_token']);
        $search = $search->getGraphEdge()->asArray();




        try {
            foreach ($search as $key) {
                  if ($int === 1) {
                      $value = $key;
                      $int = 2;
                      //echo "first loop";
                      }
                  }
            
            
            
            
                foreach ($data as $keys) {

                  
                       
                        if (strpos($value['name'],$keys['name']) !== false) {
                    /*
$fbApp = new Facebook\FacebookApp('//', '//');
$request = new Facebook\FacebookRequest($fbApp,  $_SESSION['facebook_access_token'], 'POST', '/me/feed',
  array (
    'message' => 'has watched '.$keys['name'],
      'link' => 'Http://facebook.com/'.$keys['id'],
  ));
*/

// Send the request to Graph
try {
  //$response = $fb->getClient()->sendRequest($request);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
 // echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  //echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
                      break;
                        } else {
                            $int++;
                            if($int=== count($data)){
                            echo '<br> <div class="fb-page" data-href="https://www.facebook.com/' . $value['id'] . '" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/' . $value['id'] . '"><a href="https://www.facebook.com/' . $value['id'] . '">' . $value['name'] . '</a></blockquote></div></div>';
                            }
                }
            
    }} catch (FacebookSDKException $e) {
            
        }

        $conn->close();
    }
}