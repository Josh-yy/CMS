<?php session_start(); 
isUserLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Blog</title>
    <link rel="stylesheet" href="modals/modals.css">
    <link rel="stylesheet" href="css/main.css">
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
    <script type="text/javascript" src="jquery.min.js"></script>
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
    <?php require "modals/added_success.php" ?>
    <div class="add-blog-modal">
        <div class="modal-heading">
            <div class="modal-title">
                <p><span class="modal-title-first-section">Add</span> <span class="modal-title-second-section">new blog</span></p>
            </div>
            <div class="modal-close-button-container">
                <a href="adminpage.php" class="modal-close-button" ><img src="public/external/close-button.svg" alt="close-button" class="modal-close-button-picture"></a>
            </div>
        </div>
            <form id="addBlogForm" class="modal-main" enctype="multipart/form-data">
                <div class="modal-main-sections">
                    <label for="title" class="modal-title-label">Title</label>
                    <input required name= "blogTitle" class="modal-title-input" type="text" placeholder="e.g Exploring the Wonders of The World: A Comprehensive Guide">
                </div>
                <div class="modal-main-sections">
                    <label for="title" class="modal-title-label">Description</label>
                    <textarea required name="blogDescription" rows="3" class="modal-title-description" placeholder="e.g Earth, our home planet, is a marvel of natural beauty and complexity. It is the third planet from the Sun and the only known celestial body to harbor life."></textarea>
                </div>
                <div class="modal-main-sections">
                    <label for="title" class="modal-title-label">Category</label>
                    <select name="blogCategory" class="modal-title-category">
                        <option  value="">Select Category</option>
                        <option  value="Technology">Technology</option>
                        <option  value="Travel">Travel</option>
                        <option  value="Health and Wellness">Health and Wellness</option>
                        <option  value="Nature and Environment">Nature and Environment</option>
                        <option  value="Fashion">Fashion</option>
                        <option  value="Politics and Society">Politics and Society</option>
                        <option  value="Personal Development">Personal Development</option>
                    </select>
                </div>
                <div class="modal-main-sections">
                    <label for="title" class="modal-title-label">Image</label>
                    <input required name="blogImage" class="modal-title-input" type="file" accept="image/jpeg, image/png, image/jpg">
                </div>
                <div class="modal-main-sections">
                    <label for="title" class="modal-title-label">Content</label>  
                    <textarea id="tinymce" name="blogContent"></textarea>
                </div>
                <div class="modal-action-sections">
                    <a href="adminpage.php" type="button" class="modal-action-button-cancel">Cancel</a>
                    <button type="submit" class="modal-action-button-confirm">Add Blog</button>
                </div>
            </form>
    </div>
    <dialog success-modal id="successModal" >
        <div>
            <img class="successIcon" src="imgs/check.png" alt="successIcon">
        </div>
        <div>
            <h1>Success</h1>
        </div>
        <div>
            <p id="successResponse"></p>
        </div>
        <a href="/admin" closeSuccessModal class="btn btn-success btn-ig btn-block">Confirm</a>
    </dialog>
</body>
<script>

const modal = document.querySelector('.added-success-modal');
const confirmButton = document.querySelector('.js-confirm');

function showSuccessModal() {
    modal.showModal();
}

confirmButton.addEventListener('click', function() {
    modal.close();
});

<?php 
    if(isset($_SESSION['add_blog_success'])){
        echo "showSuccessModal();";
        unset($_SESSION['add_blog_success']);
    }
?>

</script>
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on("click", "[closeSuccessModal]", function() {
        const modal = document.querySelector("#successModal");
        modal.close();
        location.reload();
        });

        $('#addBlogForm').on("submit", function(e){
                e.preventDefault();
                var datas = $(this).serializeArray();
                var data_array = {};
                $.map(datas, function(data){
                    data_array[data['name']]=data['value'];
                });
                // console.log(datas);
                // console.log(data_array);
                $.ajax({
                    url: "controllers/admin.contr.php",
                    method: "POST",
                    data:{
                    'add_blog': true,
                    ...data_array,
                    },
                    success:function(respond){
                    popUpSuccessModal(respond);
                    },
                    error:function(error){
                        alert("Something went wrong");
                    }
                })
            })

    function goBackToAdmin(){

    }
})
</script>
</html>
