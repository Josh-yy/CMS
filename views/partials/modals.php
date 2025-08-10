<dialog id="addModal">
    <div class="add-blog-modal">
    <div class="modal-heading">
        <div class="modal-title">
            <p><span class="modal-title-first-section">Add</span> <span class="modal-title-second-section">new blog</span></p>
        </div>
        <div class="modal-close-button-container">
            <button class="modal-close-button" ><img src="public/external/close-button.svg" alt="close-button" class="modal-close-button-picture"></button>
        </div>
    </div>
    <form id="addBlogForm" action="controllers/blog.contr.php" method="post" class="modal-main" enctype="multipart/form-data">
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
            <textarea name="blogContent" class="tinymce" id="tinymce"></textarea>
        </div>
        <div class="modal-action-sections">
            <button type="button" class="modal-action-button-cancel">Cancel</button>
            <button type="submit" class="modal-action-button-confirm">Add Blog</button>
        </div>
    </form>
    </div>
</dialog>