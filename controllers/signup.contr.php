<?php 
require '../class/users.class.php';
$signUp = new Users();

if ($_POST["signup"]) {
    unset($_POST['signup']);
    $signUp->signupUser($_POST);
    echo "Congratulations, you are all set!";
    exit;
}else {
    header("Location: /signup");
    exit;
}

