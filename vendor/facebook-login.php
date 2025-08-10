<?php
require_once 'facebook-config.php';


$callbackUrl = 'http://localhost:8000/vendor/facebook-login-callback.php';


$permissions = ['email']; 


$loginUrl = $fbHelper->getLoginUrl($callbackUrl, $permissions);

echo '  <div class="mb-3">
            <a class="facebook-login-button" href="' . htmlspecialchars($loginUrl) . '">Facebook</a>
        </div>
        ';
