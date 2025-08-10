<?php
require_once __DIR__ . '/autoload.php';

$client = new Google_Client();
$client->setClientId('393155941759-mh07qkfub8q6b1ghpbjnm7snlm9htibu.apps.googleusercontent.com'); // Replace with your Client ID
$client->setClientSecret('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'); // Replace with your Client Secret
$client->setRedirectUri('http://localhost:8000/login'); // Replace with your redirect URI
$client->addScope('email');
$client->addScope('profile');
