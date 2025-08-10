<?php 

function getTotalBlog($mydb){
    $mydb->select('tbl_blogs');
    echo $mydb->res->num_rows;
}

function getTotalUser($mydb){
    $mydb->select('tbl_users');
    echo $mydb->res->num_rows;
}

function displayAverageLike($mydb){
    $mydb->select('tbl_blogs', 'blog_likes');
    $sumOfLikes = 0;
    while ($row = $mydb->res->fetch_assoc()){
        $sumOfLikes += $row['blog_likes'];
    }

    if ($mydb->res->num_rows > 0){
        if($sumOfLikes == 0){
            $averageLikes = 0;
        }else{
            $averageLikes = $sumOfLikes / $mydb->res->num_rows;
        }
    }else{
        $averageLikes = 0;
    }
    
    
    echo round($averageLikes);
}

function displayTopFourBlogs($mydb){
    $sql = "SELECT * FROM tbl_blogs ORDER BY blog_likes DESC LIMIT 4;";
    $result = $mydb->conn->query($sql);  

    echo '<div class="index-stories">';
    
    while ($row = $result->fetch_assoc()) {
        echo '<div class="index-contents-main">';
        echo '<div class="index-picture">';
        echo '<img src="public/internal/' . $row['blog_image'] . '" class="index-markuswinklert-gb-xi-hc-p-kr-munsplash1" />';
        echo '</div>';
        echo '<div class="index-categories">';
        echo '<span class="index-text22">';
        echo '<span>' . $row['blog_category'] . '</span>';
        echo '</span>';
        echo '</div>';
        echo '<div class="index-blog-title">';
        echo '<span class="index-text24">';
        echo '<span>' . $row['blog_title'] . '</span>';
        echo '</span>';
        echo '</div>';
        echo '<div class="index-description">';
        echo '<span class="index-text26">';
        echo '<span>' . $row['blog_description'] . '</span>';
        echo '</span>';
        echo '</div>';
        echo '</div>';
    }
        
    echo '</div>';
}

function displayBlog($mydb){
    if (isset($_GET["id"])) {

        $edit_id = [ 
            'blog_id' => $_GET["id"]
        ];
        $mydb->select('tbl_blogs', '*', $edit_id);
    
        if ($mydb->res->num_rows == 1) {
            $row = $mydb->res->fetch_assoc();
            return $row;
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: Blog not found.</div>";
            exit;
        }
    } else {
        header("Location: /collection");
    }
    
}