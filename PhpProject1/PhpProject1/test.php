<?php
error_reporting(E_ERROR | E_PARSE);

require_once '/home/k1116774/www/public_html/PhpProject1/vendor/facebook/php-sdk-v4/src/Facebook/autoload.php';
session_start();
$fb = new Facebook\Facebook([
    'app_id' => '//',
    'app_secret' => '//',
    'default_graph_version' => 'v2.5',
        ]);



$faithless = '32446259606';
$underworld = '21193697848';
$orbital = '168417959872853';

$IDs = [$faithless, $underworld, $orbital];

foreach ($IDs as $value) {



    try {
        // Returns a `Facebook\FacebookResponse` object
        $response = $fb->get($value . '/?fields=name,band_members,website,cover,like', $_SESSION['facebook_access_token']);
        $user = $response->getGraphUser();
        echo "<h1>" . $user['name'] . "</h1>";
        question1($user);
        question2($user);
  
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        //echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
}

function question1($band) {

    Members($band);
    Website($band);
}

function question2($band) {
    coverphoto($band);
}



function Members($band) {
    echo 'band members: ';
    if (!$band["band_members"]) {
        echo '<p>no band members listed.</p>';
    } else {
        echo "" . $band["band_members"] . "<br>";
    }
}

function Website($band) {
    Echo 'website: ';
    if (!$band["website"]) {
        echo 'no website listed';
    } else {


        echo $band["website"] . "<br>";
    }
}

function coverphoto($band) {
    echo 'Cover photo: ';
    if (!band['cover']) {
        echo 'no cover picture';
    } else {
        foreach ($band['cover'] as $key => $value) {
            if ($key === 'source') {
                echo ' <img src="' . $value . '">';
            }
        }
    }
}



?>

