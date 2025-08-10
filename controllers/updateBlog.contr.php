<?php 
require '../class/db.class.php';
$mydb = new myDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $edit_id = $_POST["blogId"];
    $blogTitle = $_POST['blogTitle'];
    $blogDescription = $_POST['blogDescription'];
    $blogCategory = $_POST['blogCategory'];
    $blogContent = $_POST['blogContent'];


    if ($_FILES['blogImage']['size'] > 0) {
        
        $blogImage = $_FILES['blogImage'];
        $fileName = $_FILES['blogImage']['name'];
        $fileTmpName = $_FILES['blogImage']['tmp_name'];
        $newFileName = uniqid() . "-" . $fileName;
        $fileDestination = "../public/internal/" . $newFileName;

       
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            
            $sql = "UPDATE tbl_blogs SET blog_title=?, blog_description=?, blog_category=?, blog_image=?, blog_content=? WHERE blog_id=?";
            $stmt = $mydb->conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("sssssi", $blogTitle, $blogDescription, $blogCategory, $newFileName, $blogContent, $edit_id);
                if ($stmt->execute()) {
                    
                    header("Location: /admin");
                    exit();
                } else {
                    echo "Error updating blog post: " . $stmt->error;
                }
            } else {
                echo "Error preparing statement: " . $connection->error;
            }
            
            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        
        $sql = "UPDATE tbl_blogs SET blog_title=?, blog_description=?, blog_category=?, blog_content=? WHERE blog_id=?";
        $stmt = $mydb->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssssi", $blogTitle, $blogDescription, $blogCategory, $blogContent, $edit_id);
            if ($stmt->execute()) {
                
                header("Location: /admin");
                exit();
            } else {
                echo "Error updating blog post: " . $stmt->error;
            }
        } else {
            echo "Error preparing statement: " . $connection->error;
        }
        
        $stmt->close();
    }

    
    $connection->close();
} 
