<?php 

require '../class/db.class.php';
$mydb = new myDB();

if (isset($_POST['search_collection'])) {
    
    $where = $_POST['query'];
    
    $mydb->search('tbl_blogs', '*', $where);
    
    $datas = [];
    while ($row = $mydb->res->fetch_assoc()) {
        array_push($datas, $row);
    }
    
    echo json_encode($datas);
    exit;
}
