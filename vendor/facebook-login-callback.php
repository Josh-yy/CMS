<?php
session_start();
require '../class/db.class.php';
require_once 'facebook-config.php';

$mydb = new myDB();


try {
    $accessToken = $fbHelper->getAccessToken();

    if (!isset($accessToken)) {
        echo "Error: " . $fbHelper->getError();
        header('Location: /');
        exit;
    }

    $response = $fb->get('/me?fields=id,first_name,last_name,email', $accessToken);
    $user = $response->getGraphUser();

    $provider_id = $user['id'];
    $provider_name = 'facebook';
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $email = $user['email'];
    $user_role = 'Registered User';

    $userData = [ 'provider_id' => $provider_id];
    $mydb->select('tbl_users', '*', $userData);
    $user = $mydb->res->fetch_assoc();

    if($user) {
        $_SESSION['loggedIn'] = $accessToken;
        $_SESSION['user_id'] = $provider_id;
        $_SESSION['user_first_name'] = $first_name;
        $_SESSION['user_email'] = $email;
    } else {
        $data = [
            'provider_id' => $provider_id,
            'provider_name' => $provider_name,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'user_role' => $user_role,
          ];
        $mydb->insert('tbl_users', $data);
        $_SESSION['loggedIn'] = $accessToken;
        $_SESSION['user_id'] = $provider_id;
        $_SESSION['user_first_name'] = $first_name;
        $_SESSION['user_email'] = $email;
    }
    header('Location: /');
    exit;
} catch (\Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}
