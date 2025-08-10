<?php
require_once __DIR__ . '/autoload.php'; // Include Composer's autoload

// Facebook App Configuration
$fb = new \Facebook\Facebook([
    'app_id' => '1209121840162119',          // Replace with your App ID
    'app_secret' => 'dde6c0412da5d2f5b712cdf0ba57c0c2',  // Replace with your App Secret
    'default_graph_version' => 'v16.0',
]);

$fbHelper = $fb->getRedirectLoginHelper();
