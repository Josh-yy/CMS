<?php 

function displayComments($mydb, $blogId){
    $sql = "
        SELECT 
            tbl_comments.comment_content,
            tbl_comments.created_at,
            tbl_users.first_name
        FROM 
            tbl_comments
        JOIN 
            tbl_users ON tbl_comments.user_id = tbl_users.id
        WHERE 
            tbl_comments.blog_post_id = ?
        ORDER BY 
            tbl_comments.created_at DESC;
    ";

    if ($stmt = $mydb->conn->prepare($sql)) {
        $stmt->bind_param("i", $blogId);  // Bind blog_id parameter
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch all comments
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="media mb-4">';
                    echo '<div class="media-body">';
                        echo '<h5 class="mt-0">' . htmlspecialchars($row['first_name']) . '</h5>';
                        echo '' . $row['comment_content'] . '';
                        echo '<small class="text-muted">Posted on ' . date('F j, Y, g:i a', strtotime($row['created_at'])) . '</small>';
                    echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No comments yet. Be the first to comment!</p>';
        }
        $stmt->close();
    } else {
        echo "Error: " . $mydb->conn->error;
    }

    echo '

    ';
}

function displayTotalComments($mydb){
    $mydb->select('tbl_comments');
    echo $mydb->res->num_rows;
}