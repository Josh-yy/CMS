<?php
session_start();
require 'google-config.php';
require '../class/db.class.php';

$mydb = new myDB();

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    $client->setAccessToken($token);

    $google_service = new Google\Service\Oauth2($client);

    $user = $google_service->userinfo->get();

    $provider_id = $user->id;
    $provider_name = 'google';
    $first_name = $user->givenName;
    $last_name = $user->familyName;
    $email = $user->email;
    $user_role = 'Registered User';

    $userData = [ 'provider_id' => $provider_id];
    $mydb->select('tbl_users', '*', $userData);
    $user = $mydb->res->fetch_assoc();

    if($user){
        $_SESSION['loggedIn'] = $token;
        $_SESSION['user_id'] = $provider_id;
        $_SESSION['user_first_name'] = $first_name;
        $_SESSION['user_email'] = $email;
    }else {
        $data = [
            'provider_id' => $provider_id,
            'provider_name' => $provider_name,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'user_role' => $user_role,
            ];
        $mydb->insert('tbl_users', $data);
        $_SESSION['loggedIn'] = $token;
        $_SESSION['user_id'] = $provider_id;
        $_SESSION['user_first_name'] = $first_name;
        $_SESSION['user_email'] = $email;
    }
    

    header('Location: /');
    exit;

} else {
    echo 'Error during login.';
}
