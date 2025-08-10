<?php 
require 'class/db.class.php';
require 'helpers/login.helper.php';

$mydb = new myDB();


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
  '/' => 'views/main.view.php',
  '/login' => 'views/login.view.php',
  '/signup' => 'views/signup.view.php',
  '/admin' => 'views/admin.view.php',
  '/addBlog' => 'views/addBlog.view.php',
  '/about' => 'views/about.view.php',
  '/collection' => 'views/collection.view.php',
  '/viewBlog' => 'views/viewBlog.view.php',
  '/logout' => 'helpers/logout.helper.php',
];

if(array_key_exists($uri, $routes)){
  require $routes[$uri];
}



