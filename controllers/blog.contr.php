<?php 
require '../class/blogs.class.php';
$newBlog = new Blog();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blogTitle = $_POST['blogTitle'];
    $blogDescription = $_POST['blogDescription'];
    $blogCategory = $_POST['blogCategory'];
    $blogImage = $_FILES['blogImage'];
    $blogContent = $_POST['blogContent'];
    $fileName = $_FILES['blogImage']['name'];
    $fileTmpName = $_FILES['blogImage']['tmp_name'];
    $newFileName = uniqid() . "-" . $fileName;
    move_uploaded_file($fileTmpName, '../public/internal/'.$newFileName);
    $newBlog->addBlog($blogTitle, $blogDescription, $blogCategory, $newFileName, $blogContent);
  } else {
    header("Location: ../adminpage.php");
    exit;
  }
  
  $connection->close();





