<?php 
require '../class/db.class.php';
$mydb = new myDB();

if ($_POST["add_comment"]) {
    unset($_POST['add_comment']);
    $mydb->insert('tbl_comments', $_POST);
    echo "Congratulations, you are all set!";
    exit;
}else {
    header("Location: /signup");
    exit;
}

if(isset($_POST['get_comment'])){
    $mydb->select('tbl_comments');
    $datas = [];
    while($row = $mydb->res->fetch_assoc()){
        array_push($datas,$row);
    }
    echo json_encode($datas);
}