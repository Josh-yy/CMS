<?php
require '../class/users.class.php';
$loginUser = new Users();

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $data =[
        'email' => $_POST['email'],
    ];
    $loginUser->loginUser($data);
} else {
    header("Location: /login");
    exit;
}


