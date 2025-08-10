<?php 

session_start();
require_once 'db.class.php';
class Blog extends myDB {

    public function __construct() {
        parent::__construct();
    }

    public function addBlog($blogTitle, $blogDescription, $blogCategory, $blogImage, $blogContent) {
        
        $sql = "INSERT INTO tbl_blogs (blog_title, blog_description, blog_category, blog_image, blog_content) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssss", $blogTitle, $blogDescription, $blogCategory, $blogImage, $blogContent);

            if ($stmt->execute()) {
                $_SESSION['add_blog_success'] = "success";
                header("Location: /admin");
            } else {
                echo "Error: " . $stmt->error;
            }

        $this->conn->close();
    }

    public function loadBlog($table, $where=null){
        $this->select($table, '*', $where);
 
        foreach ($this->res as $key => $value) {
            echo '
                <div  style="max-width: 20em; " class="index-contents-main">
                    <div class="index-picture">
                        <img style="height: unset" src="public/internal/' . $value['blog_image'] . '" class="index-markuswinklert-gb-xi-hc-p-kr-munsplash1" />
                        <div class="thumbnail-overlay">
                            <button data-post-id="' . $value['blog_id'] . '">
                                <img class="like-img" src="public/external/heart-like.svg">
                            </button>
                            <a href="/viewBlog?id=' . $value['blog_id'] . '" class="go-button"><span>Read more</span><i><img src="public/external/go-collection.svg" alt="dropdownarrowsvgrepocom11365" class="like-button-picture" /></i></a>
                            </span>
                        </div>
                    </div>
                    <div style="width: 100%" class="index-categories">
                        <span style="font-size: .6em" class="index-text22">
                        <span>' . $value['blog_category'] . '</span>
                        </span>
                        <span class="like-count">' . $value['blog_likes'] . '</span>
                    </div>
                    <div class="index-blog-title">
                        <span style="width: 100%; font-size: 1em" class="index-text24">
                        <span>' . $value['blog_title'] . '</span>
                        </span>
                    </div>
                    <div class="index-description">
                        <span style="font-size: .7em" class="index-text26">
                        <span>' . $value['blog_description'] . '</span>
                        </span>
                    </div>
                    <div style="width: 100%;" class="index-categories">
    
                    </div>
                </div>
            ';
        } 
        }

}