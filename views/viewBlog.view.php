<?php require "partials/nav.php"; ?>
<?php   
   $data = displayBlog($mydb);
?>
<div class="blog-content">
    <div  style="max-width: 100%" class="index-contents-main">
        <div class="index-blog-title">
            <span style="width: 100%; font-size: 2em" class="index-text24">
                <span><?= $data['blog_title'] ?></span>
            </span>
        </div>
        <div class="index-categories">
            <span class="index-text22">
                <span style="font-size: 1.5em; font-weight:200;"><?php 
                $sec = strtotime($data['created_at']); 
                $newdate = date ("F jS Y H:i:s", $sec);  
                echo "Last Updated: $newdate" ?></span>
            </span>
        </div>
        <div style="max-width: 70%" class="index-frame18">
            <img style="width: 100%; object-fit: cover; border-radius: 10px; margin-top: 2em; margin-bottom: 2em;" src="public/internal/<?= $data['blog_image'] ?>" alt="about-us-picture">
        </div>
        <div class="index-description">
            <span class="index-text26">
                <span style="font-size: 1.2em; font-weight: 400;"><?= $data['blog_description'] ?></span>
            </span>
        </div>
    </div>
    <div  style="max-width: 100%; gap: 20px;" class="index-contents-main">
    <?= $data['blog_content'] ?>
    </div>
    <?= require "partials/comment.php"; ?>
</div>


<?php require "partials/footer.php"; ?>