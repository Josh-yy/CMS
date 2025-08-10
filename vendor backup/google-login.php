<?php
require_once 'google-config.php';

echo '
<div class="mb-3">
    <a class="google-login-button" href="<?= $client->createAuthUrl() ?>">Google</a>
</div>';
