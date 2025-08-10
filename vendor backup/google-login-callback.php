<?php
require_once 'google-config.php';

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Get user profile info
    $google_service = new Google_Service_Oauth2($client);
    $userInfo = $google_service->userinfo->get();

    $_SESSION['loggedIn'] = true;
    $_SESSION['user_id'] = $userInfo->id;
    $_SESSION['user_name'] = $userInfo->name;
    $_SESSION['user_email'] = $userInfo->email;

    header('Location: /'); // Redirect to index.php (the '/' route in your routing array)
    exit;
} else {
    echo 'Error during login.';
}
