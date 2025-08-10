<?php
require_once __DIR__ . '/autoload.php'; 


$fb = new \Facebook\Facebook([
    'app_id' => '1209121840162119',  
    'app_secret' => 'dde6c0412da5d2f5b712cdf0ba57c0c2', 
    'default_graph_version' => 'v16.0',
]);

$fbHelper = $fb->getRedirectLoginHelper();
