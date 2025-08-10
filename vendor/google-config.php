<?php
require_once __DIR__ . '/autoload.php';

$client = new Google\Client;
$client->setClientId('');
$client->setClientSecret('');
$client->setRedirectUri('http://localhost:8000/vendor/google-login-callback.php');
$client->addScope('email');
$client->addScope('profile');
