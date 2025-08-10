<?php 

function isUserLoggedIn(){
    if (!isset($_SESSION["loggedIn"])) {
        header("Location: /login");
        exit();
    }
}

function isUserAdmin(){
    if (!isset($_SESSION["admin"])) {
        header("Location: /login");
        exit();
    }
}