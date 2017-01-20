<?php
include_once "{$_SERVER[DOCUMENT_ROOT]}/bbs_infra/db/connection.php";


$_id = $_POST['_id'];
$sql = "DELETE FROM reply WHERE _id={$_id}";
$result = $conn->query($sql);
echo $result;
?>
