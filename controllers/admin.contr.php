<?php 
require '../class/db.class.php';
$mydb = new myDB();

if(isset($_POST['add_blog'])){
    unset($_POST['add_blog']);
    $mydb->insert('tbl_blogs', $_POST);
}

if(isset($_POST['add_comment'])){
    unset($_POST['add_comment']);
    $mydb->insert('tbl_comments', $_POST);
}

if(isset($_POST['get_blog'])){
    $mydb->select('tbl_blogs');
    $datas = [];
    while($row = $mydb->res->fetch_assoc()){
        array_push($datas,$row);
    }
    echo json_encode($datas);
}

if(isset($_POST['get_blog_update']) && isset($_POST['blog_id'])){
    $where = ['blog_id' => $_POST['blog_id']];
    $mydb->select('tbl_blogs', '*', $where);
    $data = $mydb->res->fetch_assoc();
    echo json_encode($data);
}

if (isset($_POST['update_blog'])) {
    $datas = [
        'blog_title' => $_POST['blogTitle'],
        'blog_description' => $_POST['bloDescription'],
        'blog_image' => $_POST['blogImage'],
        'blog_category' => $_POST['blogCategory'],
        'blog_content' => $_POST['blogContent'],
    ];
    $where = ['blog_id' => $_POST['blogId']];
    $mydb->update('tbl_blogs', $datas, $where);
    echo "Succesfully updated blog data!"; 
    exit;
}


if (isset($_POST['delete_blog'])) {
    $blogId = $_POST['blog_id'];
    $where = ['blog_id' => $blogId];
    $mydb->delete('tbl_blogs', $where);
    echo "Succesfully Deleted Student Data";
    exit;
}

if (isset($_POST['search_student'])) {
    
    $where = $_POST['query'];
    
    $mydb->search('tbl_students', '*', $where);
    
    $datas = [];
    while ($row = $mydb->res->fetch_assoc()) {
        array_push($datas, $row);
    }
    
    echo json_encode($datas);
    exit;
}

if(isset($_POST['load_blog'])){
    $mydb->select('tbl_blogs');
    $datas = [];
    while($row = $mydb->res->fetch_assoc()){
        array_push($datas,$row);
    }
    echo json_encode($datas);
}

if (isset($_POST['filter_blog'])) {
    $where = $_POST['category'];
    $mydb->filter('tbl_blogs', '*', $where);
    
    $datas = [];
    while ($row = $mydb->res->fetch_assoc()) {
        array_push($datas, $row);
    }
    
    echo json_encode($datas);
    exit;
}


?>