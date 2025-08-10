<?php
require_once __DIR__ . '/autoload.php';

$client = new Google\Client;
$client->setClientId('393155941759-mh07qkfub8q6b1ghpbjnm7snlm9htibu.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost:8000/vendor/google-login-callback.php');
$client->addScope('email');
$client->addScope('profile');
