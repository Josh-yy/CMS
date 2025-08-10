<?php
require_once 'facebook-config.php';

// Define the callback URL
$callbackUrl = 'http://localhost:8000/vendor/facebook-login-callback.php';

// Set permissions (optional)
$permissions = ['email']; // Ask for email access, you can add more

// Generate the login URL
$loginUrl = $fbHelper->getLoginUrl($callbackUrl, $permissions);

echo '  <div class="mb-3">
            <a class="facebook-login-button" href="' . htmlspecialchars($loginUrl) . '">Facebook</a>
        </div>
        ';
