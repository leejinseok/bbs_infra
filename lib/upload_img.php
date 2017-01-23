<?php
include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/db/connection.php";


if($_FILES['file']['name']){
    $bbs_id = $_POST['bbs_id'];
    $name = md5(rand(100,200));
    $ext = explode('.', $_FILES['file']['name']);
    $filename = $name.'.'.$ext[1];
    $destination = "../uploaded/".$filename;
    $location = $_FILES['file']['tmp_name'];

    $sql = "INSERT INTO uploaded_file(bbs_id,file_name,regdate) VALUES({$bbs_id},'{$filename}', now())";
    $result = $conn->query($sql);
    if(move_uploaded_file($location, $destination)){
        echo $filename;
    }
    else{
        //echo "no";
    }
}
 ?>
