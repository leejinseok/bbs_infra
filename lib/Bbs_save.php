<?php
include_once "{$_SERVER[DOCUMENT_ROOT]}/bbs_infra/db/connection.php";
session_start();

$bbs_id = $_POST['bbs_id'];
$user_id = $_SESSION['ss__id'];
$title = $_POST['title'];
$content = $_POST['content'];

//save bbs
$sql = "INSERT INTO board(_id, user_id, title, content, regdate) VALUES($bbs_id,$user_id, '{$title}', '{$content}', now())";
$result_save_bbs = $conn->query($sql);
echo $result_save_bbs;

//업로드한 파일 중에 본문에서 삭제된 파일들 저장소에서 삭제
$sql = "SELECT * FROM uploaded_file WHERE bbs_id = {$bbs_id}"; //현재 등록된 게시글에서 올린 모든 파일들이 저장되어 있는 table(uploaded_file)
$result_select_file = $conn->query($sql);
if($result_select_file->num_rows > 0){
    while($row = $result_select_file->fetch_assoc()){
        $filename = $row['file_name'];
        $sql_valid_file = "SELECT _id FROM board WHERE content like '%{$filename}%' AND _id=$bbs_id";
        $result_valid_file = $conn->query($sql_valid_file);

        //uploaded_file에 존재하는 파일이 content에 존재하지 않으면 파일삭제, 테이블에서도 삭제
        if($result_valid_file->num_rows < 1){
            $conn->query("DELETE FROM uploaded_file WHERE _id={$row['_id']}");
            unlink("../uploaded/{$filename}");
        }
    }
}

?>
