<?php
include_once "{$_SERVER[DOCUMENT_ROOT]}/bbs_infra/db/connection.php";
$user_id = $_POST['user_id'];
$pwd = $_POST['pwd'];

$sql = "SELECT user_id, pwd FROM tb_users WHERE user_id='{$user_id}' AND pwd='{$pwd}'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "true";
} else {
    echo "false";
}
$conn->close();
?>
