<?php
require_once 'google-config.php';

$loginUrl = $client->createAuthUrl();
echo '
<div class="mb-3">
    <a class="google-login-button" href="' . htmlspecialchars($loginUrl) . '">Google</a>
</div>';
