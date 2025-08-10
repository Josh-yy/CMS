<?php
require 'class/blogs.class.php';
isUserLoggedIn();
isUserAdmin();
require 'models/blog.model.php';
$newBlog = new Blog();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta
      name="viewport"
      content="width=device-width, initial-scale=1.0" /><meta
      charset="utf-8" /><meta
      property="twitter:card"
      content="summary_large_image" />
  <title>Admin Page</title>
  <link rel="stylesheet" href="css/main.css">
  <script type="text/javascript" src="jquery.min.js"></script>
  <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css" /><link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font" /><link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font" /><link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font" /><link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
    <link rel="stylesheet" href="modals/modals.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tiny.cloud/1/r9923y6h3npsw679qemd2ik8gpn7isyrjsxk98jzd6ltpcvn/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#tinymce',
            width: '100%',
            plugins: [
                "autolink", "lists", "link", "charmap", "preview", "hr", "anchor",
                "pagebreak", "searchreplace", "wordcount", "visualblocks", "fullscreen", "insertdatetime",
                "media", "table", "code", "checklist", "mediaembed", "tableofcontents", "footnotes",
                "autocorrect", "markdown"
            ],
            toolbar: [
                "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | insertdatetime | tableofcontents | checklist numlist bullist indent outdent | emoticons charmap | removeformat"
            ],
            height: 700,
        });
    </script>
</head>
<body>
    <?php require 'partials/modals.php'; ?>
    <div class="home-container">
        <?php require "modals/added_success.php"; ?>
        <div class="home-heading">
            <div class="home-frame12">
                <span class="home-text">
                    <span class="home-text01">(CMS)</span>
                    <span> </span>
                    <span class="home-text03">Content Management System - Blog Site</span>
                </span>
            </div>
            <div class="home-frame11">
                <button class="open-menu-modal">
                    <span class="home-text04">
                        <span class="home-text05">Welcome back, </span>
                        <span style="color: #9fa268;"><?php echo $_SESSION["loggedIn"]?></span>
                    </span>
                    <div class="home-frame13">
                        <img src="public/external/dropdown.svg" alt="dropdownarrowsvgrepocom11365" class="home-dropdownarrowsvgrepocom1" />
                    </div>
                </button>
                <dialog id="openMenuModal">
                    <div class="modal-close-button-container menu-close-modal-container">
                        <button class="modal-close-button menu-close-modal" ><img src="public/external/close-button.svg" alt="close-button" class="modal-close-button-picture"></button>
                    </div>
                    <div class="d-flex flex-column align-items-start home-frame13">
                        <a style="text-decoration: none;" class="home-frame13 home-text05 menu-button" href="/">Go to Viewer Side <i class="menu-icon"><img src="public/external/go.svg" alt="dropdownarrowsvgrepocom11365" class="home-dropdownarrowsvgrepocom1" /></i></a>
                        <a style="text-decoration: none; width: 100%" class="home-frame13 home-text05 menu-button" href="/logout">Logout <i class="mennu-icon" style=" margin-left: auto"><img src="public/external/logout.svg" alt="dropdownarrowsvgrepocom11365" class="home-dropdownarrowsvgrepocom1" /></i></a>
                    </div>
                </dialog>  
            </div>
        </div>
        <div class="home-main">
            <div class="home-section1">
                <div class="home-overview">
                    <span class="home-text07">
                        <span>Overview</span>
                    </span>
                </div>
            </div>
            <div class="home-section2">
                <div class="home-totalblogpostcount">
                    <div class="home-overviewcontainer">
                        <span class="home-text09">
                            <span>Total Blog Post</span>
                        </span>
                    </div>
                    <div class="home-blogposttotalcount">
                        <span class="home-text11"><?php getTotalBlog($mydb); ?></span>
                    </div>
                </div>
                <div class="home-totalusercount">
                    <div class="home-overviewcontainer1">
                        <span class="home-text12">
                            <span>Total User Count</span>
                        </span>
                    </div>
                    <div class="home-blogposttotalcount1">
                        <span class="home-text14"><span><?php getTotalUser($mydb); ?></span></span>
                    </div>
                </div>
                <div class="home-averagelikeeachblogpost">
                    <div class="home-overviewcontainer2">
                        <span class="home-text16">
                            <span>Average Likes in Blog Post</span>
                        </span>
                    </div>
                    <div class="home-blogposttotalcount2">
                        <span class="home-text18"><?php displayAverageLike($mydb); ?></span>
                    </div>
                </div>
            </div>
            <div class="home-section3">
                <div class="home-frame1">
                    <div class="home-overview01">
                        <span class="home-text19">
                            <span>Blog Post Details</span>
                        </span>
                    </div>
                    <div class="home-overview02">
                        <button id="btnOpenAddModal" class="add-new-button"><img class="add-button-svg" src="public/external/add.svg" alt="">Add New Post</button>
                    </div>
                </div>
                <div class="home-overview03">
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th style='width: 3%'>No.</th>
                                <th style='width: 15%; text-align: justify'>Title</th>
                                <th style='width: 10%'>Image</th>
                                <th style='width: 25%'>Description</th>
                                <th style='width: 15%'>Category</th>
                                <th style='width: 8%'>Date Posted</th>
                                <th style='width: 3%'>Likes</th>
                                <th style='text-align: center'>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tBodyBlogs">
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <dialog data-modal id="blogToUpdate">
    
        </dialog>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function(){
        loadBlog();

        $(document).on("click", "[openUpdateModal]", function() {
            const studentId = $(this).data('blog-id');
            const modal = document.querySelector("[data-modal]");
            modal.showModal();
            loadUpdateBlog(studentId);

            // Ensure TinyMCE is reinitialized after the modal content is loaded
            setTimeout(function() {
                tinymce.remove(); // Remove any existing TinyMCE instances
                tinymce.init({
                    selector: '#tinymce',
                    width: '100%',
                    plugins: [
                        "autolink", "lists", "link", "charmap", "preview", "hr", "anchor",
                        "pagebreak", "searchreplace", "wordcount", "visualblocks", "fullscreen", "insertdatetime",
                        "media", "table", "code", "checklist", "mediaembed", "tableofcontents", "footnotes",
                        "autocorrect", "markdown"
                    ],
                    toolbar: [
                        "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | insertdatetime | tableofcontents | checklist numlist bullist indent outdent | emoticons charmap | removeformat"
                    ],
                    height: 700,
                });
            }, 500); // Delay to ensure content is loaded before TinyMCE initialization
        });


        $(document).on("click", ".open-menu-modal", function() {
            const modal = document.querySelector("#openMenuModal");
            modal.show();
        });

        $(document).on("click", ".menu-close-modal", function() {
            const modal = document.querySelector("#openMenuModal");
            modal.close();
        });

        $(document).on("click", "#btnOpenAddModal", function() {
            const modal = document.querySelector("#addModal");
            modal.showModal();

        });

        $(document).on("click", ".modal-close-button", function() {
            const modal = document.querySelector("#addModal");
            modal.close();
        });

        $(document).on("click", ".modal-close-button", function() {
            const modal = document.querySelector("#blogToUpdate");
            modal.close();
        });

        $(document).on("click", ".modal-action-button-cancel", function() {
            const modal = document.querySelector("#blogToUpdate");
            modal.close();
        });

        $(document).on("click", ".modal-action-button-cancel", function() {
            const modal = document.querySelector("#addModal");
            modal.close();
        });

        $(document).on("click", "[closeUpdateModal]", function() {
            const modal = document.querySelector("[data-modal]");   
            modal.close();
        });

        $(document).on("click", "[closeSuccessModal]", function() {
            const modal = document.querySelector("#successModal");
            modal.close();
        });

        $(document).on("click", "[deleteBlog]", function(){
            var blogId = $(this).data('blog-id'); 

            $.ajax({
                url: "controllers/admin.contr.php",
                method: "POST",
                data: {
                    "delete_blog": true,
                    "blog_id": blogId
                },
                success: function(){
                    loadBlog(); 
                },
                error: function(error){
                    alert("Something went wrong"); 
                }
            });
        });

        $(document).on("input", "#searchQuery", function() {
        var query = $(this).val();

        $.ajax({
            url: "db/request.php",
            method: "POST",
            data: {
                "search_student": true,
                "query": query
            },
            
            success: function(result) {
                console.log(result);
                var tBody = ``;
                var datas = JSON.parse(result);
                datas.forEach(function(data){
                    tBody += `<tr>`;
                    tBody += `<td>${data['full_name']}</td>`;
                    tBody += `<td>${data['email']}</td>`;
                    tBody += `<td>${data['course_year_section']}</td>`;
                    tBody += `<td>
                                <button class="btn btn-warning btn-sm" openUpdateModal data-student-id="${data['id']}">Update</button>
                                <button class="btn btn-danger btn-sm" deleteBlog data-student-id="${data['id']}">Archive</button>
                                </td>`;
                    tBody += `</tr>`;
                });
                $('#tBodyStudent').html(tBody);
            },
            error: function() {
                alert("Something went wrong during search");
            }
        });
    });

    })

    function loadBlog(){ 
        $.ajax({
            url: "controllers/admin.contr.php",
            method: "POST",
            data:{
                "get_blog": true,
            },
            success:function(result){
                var tBody = ``;
                var datas = JSON.parse(result);
                var i = 1;
                datas.forEach(function(data){
                    tBody += `<tr>`;
                        tBody += `<td style='text-align: center'>${i}</td>`;
                        tBody += `<td style='text-align: justify'>${data["blog_title"]}</td>`;
                        tBody += `<td><img src='public/internal/${data["blog_image"]}' style='width: 10em'></td>`;
                        tBody += `<td style='text-align: justify'>${data["blog_description"]}</td>`;
                        tBody += `<td>${data["blog_category"]}</td>`;
                        tBody += `<td style='text-align: center'>${data["created_at"]}</td>`;
                        tBody += `<td style='text-align: center'>${data["blog_likes"]}</td>`;
                        tBody += `<td class='d-flex justify-content-center'>
                                    <button class="btn btn-warning btn-sm me-1" openUpdateModal data-blog-id="${data['blog_id']}">Update</button>
                                    <button class="btn btn-danger btn-sm" deleteBlog data-blog-id="${data['blog_id']}">Delete</button>
                                </td>`;
                        tBody += `</tr>`;
                        i++;
                    });

                $('#tBodyBlogs').html(tBody);
            },
            error:function(error){
                alert("Something went wrong")
            }
        })
    }

    function popUpSuccessModal(respond){
        const modal = document.getElementById("successModal");
        const response = document.querySelector('#successResponse')
        
        response.innerHTML = respond;
        modal.showModal();
    }

    function loadUpdateBlog(studentId){
        $.ajax({
            url: "controllers/admin.contr.php",
            method: "POST",
            data:{
                "get_blog_update": true,
                "blog_id": studentId,
            },
            success:function(result){
                var data = JSON.parse(result);
                var categories = [
                                    "Technology",
                                    "Travel",
                                    "Health and Wellness",
                                    "Nature and Environment",
                                    "Fashion",
                                    "Politics and Society",
                                    "Personal Development"
                                ];
                var modalContent = `
                    <div class="add-blog-modal">
                        <div class="modal-heading">
                            <div class="modal-title">
                                <p><span class="modal-title-first-section">Add</span> <span class="modal-title-second-section">new blog</span></p>
                            </div>
                            <div class="modal-close-button-container">
                                <button class="modal-close-button" ><img src="public/external/close-button.svg" alt="close-button" class="modal-close-button-picture"></button>
                            </div>
                        </div>
                        <form id="updateBlogForm" action="controllers/updateBlog.contr.php" method="post" class="modal-main" enctype="multipart/form-data">
                            <div class="modal-main-sections">
                                <label for="title" class="modal-title-label">Title</label>
                                <input required value="${data['blog_title']}" name= "blogTitle" class="modal-title-input" type="text" placeholder="e.g Exploring the Wonders of The World: A Comprehensive Guide">
                            </div>
                            <div class="modal-main-sections">
                                <label for="title" class="modal-title-label">Description</label>
                                <textarea style="overflow-y: auto" required name="blogDescription" rows="5" class="modal-title-description" placeholder="e.g Earth, our home planet, is a marvel of natural beauty and complexity. It is the third planet from the Sun and the only known celestial body to harbor life.">${data['blog_description']}</textarea>
                            </div>
                            <div class="modal-main-sections">
                                <label for="title" class="modal-title-label">Category</label>
                                
                                <select name="blogCategory" class="modal-title-category">
                                    <option value="">Select Category</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Health and Wellness">Health and Wellness</option>
                                    <option value="Nature and Environment">Nature and Environment</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Personal Development">Personal Development</option>
                                </select>
                            </div>
                            <div class="modal-main-sections">
                                <label for="title" class="modal-title-label">Existing Image</label>
                                <img style="width: 100%;" src="public/internal/${data['blog_image']}" alt="Existing Blog Image">
                                <label for="title" class="modal-title-label">Replace Image</label>
                                <input name="blogImage" class="modal-title-input" type="file" accept="image/jpeg, image/png, image/jpg">
                            </div>
                            <div class="modal-main-sections">
                                <label for="title" class="modal-title-label">Content</label>  
                                <textarea name="blogContent" class="tinymce" id="tinymce">${data['blog_content']}</textarea>
                                <input type="hidden" name="blogId" value="${data['blog_id']}">
                            </div>
                            <div class="modal-action-sections">
                                <button type="button" class="modal-action-button-cancel">Cancel</a>
                                <button type="submit" class="modal-action-button-confirm">Update Blog</button>
                            </div>
                        </form>
                    </div>`;

                $('#blogToUpdate').html(modalContent);

            },
            error:function(error){
                alert("Something went wrong")
            }
        })
    }
</script>
</html>
