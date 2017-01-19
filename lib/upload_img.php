<?php
// include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/db/connection.php";


if($_FILES['file']['name']){

    $name = md5(rand(100,200));
    $ext = explode('.', $_FILES['file']['name']);
    $filename = $name.'.'.$ext[1];
    $destination = "../uploaded/".$filename;
    $location = $_FILES['file']['tmp_name'];
    echo $destination;
    if(move_uploaded_file($location, $destination)){
        echo "successfully uploaded";
    }
    else{
        //echo "no";
    }
}
 ?>
