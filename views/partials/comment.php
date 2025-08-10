<div class="comment-container">
    <form id="addCommentForm">
        <div class="textarea-holder">
            <input type="hidden" name="blog_post_id" value="<?= $data['blog_id'] ?>">
            <input type="hidden" name="user_id" id="" value="<?= $_SESSION['user_id'] ?>">
            <textarea name="comment_content" id="tinymce" placeholder="Leave a comment. . ."></textarea>
            <button type="submit">Comment</button>
        </div>
    </form>
    <?php 
        $blogId = $data['blog_id'];
    ?>
    <div class="card mb-4">
        <div class="card-header d-flex  align-items-center">
            <h5 class="mb-0">Comments</h5>
            <span class="badge badge-secondary ml-2 px-3 py-2"><?= displayTotalComments($mydb, $blogId); ?></span>
        </div>
        
        <div class="card-body">
            <?php 
                displayComments($mydb, $blogId); 
            ?>
        </div>
    </div>
</div>
