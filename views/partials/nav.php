<?php
require 'class/blogs.class.php';
isUserLoggedIn();
require 'models/blog.model.php';
require 'models/comment.model.php';


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Landing Page</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0" />
      <meta charset="utf-8" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css" /><link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font" /><link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font" /><link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font" /><link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
    <link href="css/index.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="modals/modals.css">
    <link rel="stylesheet" href="css/index2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/comment.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/r9923y6h3npsw679qemd2ik8gpn7isyrjsxk98jzd6ltpcvn/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
     tinymce.init({
        selector: '#tinymce',
        menubar: false,
        toolbar: 'bold italic underline | submitButton',
        toolbar_location: 'bottom',
        statusbar: false,
        branding: false,
        height: '10em',
  });
</script>
<script src="https://cdn.ckeditor.com/4.25.0-lts/standard/ckeditor.js"></script>
  </head>
  <body>
    <div class="index-container">
      <div class="index-desktop2">
        <div class="index-heading">
            <div class="index-frame12">
            <span class="index-text">
                <span class="index-text01">(CMS)</span>
                <span class="index-text02"> </span>
                <span>Blog Site</span>
            </span>
            </div>
            <div class="index-frame13">
            <div class="index-frame14">
                <a href="/" class="index-text04"><span>Home</span></a>
            </div>
            <div class="index-frame11">
                <a href="/about" class="index-text06"><span>About</span></a>
            </div>
            <div class="index-frame15">
                <a href="/collection" class="index-text08"><span>Collection</span></a>
            </div>
            </div>
            <div class="home-frame11">
              <button class="open-menu-modal2 open-menu-modal">
                  <span class="home-text04">
                      <span class="home-text05">Welcome back, </span>
                      <span style="color: #9fa268;"><?= $_SESSION['user_first_name'] ?></span>
                      <!-- <?php  ?> -->
                  </span>
                  <div class="home-frame13">
                      <img src="public/external/dropdown.svg" alt="dropdownarrowsvgrepocom11365" class="home-dropdownarrowsvgrepocom1" />
                  </div>
              </button>
              <dialog class="nav-menu-modal">
                  <div class="modal-close-button-container menu-close-modal-container">
                      <button class="modal-close-button menu-close-modal js-close"><img src="public/external/close-button.svg" alt="close-button" class="modal-close-button-picture"></button>
                  </div>
                  <div class="d-flex flex-column align-items-start home-frame13">
                      <a style="text-decoration: none; width: 100%" class="home-frame13 home-text05 menu-button" href="/logout">Logout <i class="mennu-icon" style=" margin-left: auto"><img src="public/external/logout.svg" alt="dropdownarrowsvgrepocom11365" class="home-dropdownarrowsvgrepocom1" /></i></a>
                  </div>
              </dialog>  
            </div>
        </div>
        <div class="index-main">