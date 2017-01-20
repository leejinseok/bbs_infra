<?php
include_once "{$_SERVER[DOCUMENT_ROOT]}/bbs_infra/db/connection.php";
include_once "{$_SERVER[DOCUMENT_ROOT]}/bbs_infra/lib/Get_templates.php";
session_start();

$user_id = $_POST['user_id'];
$content = $_POST['content'];
$parent_bbs_id = $_POST['parent_bbs_id'];

$sql = "INSERT INTO reply(parent_bbs_id, user_id, content, regdate ) VALUES($parent_bbs_id, $user_id, '{$content}', now())";
$result = $conn->query($sql);


$html = getReply($conn->insert_id, $_POST['replyIdx'], $user_id, $content,'true');
echo $html;
?>
