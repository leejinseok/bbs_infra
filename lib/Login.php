<?php
include_once "{$_SERVER[DOCUMENT_ROOT]}/bbs_infra/db/connection.php";
$user_id = $_POST['user_id'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM tb_users WHERE user_id='{$user_id}' AND pwd='{$pwd}'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "true";
    while($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION["ss__id"] = $row["_id"];
        $_SESSION["ss_u_level"] = $row["u_lev"];
    }
} else {
    echo "false";
}
$conn->close();
?>
