<?php
include_once "{$_SERVER[DOCUMENT_ROOT]}/bbs_infra/db/connection.php";
$user_id = $_POST['user_id'];
$pwd = $_POST['pwd'];

$sql = "SELECT user_id, pwd FROM TB_USERS WHERE user_id='{$user_id}' AND pwd='{$pwd}'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "true";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    }
} else {
    echo "false";
}
$conn->close();
?>
