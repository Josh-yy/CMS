<?php
session_start();
require_once 'facebook-config.php';

try {
    $accessToken = $fbHelper->getAccessToken();

    if (!isset($accessToken)) {
        echo "Error: " . $fbHelper->getError();
        exit;
    }

    $response = $fb->get('/me?fields=id,name,email', $accessToken);
    $user = $response->getGraphUser();

    $_SESSION['loggedIn'] = true;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];

    header('Location: /'); 
    exit;
} catch (\Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}
