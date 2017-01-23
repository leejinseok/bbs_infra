<?php
include_once "{$_SERVER[DOCUMENT_ROOT]}/bbs_infra/db/connection.php";
$bbs_id = $_POST['bbs_id'];
//게시글 삭제
$sql = "DELETE FROM board WHERE _id={$bbs_id}";
$result_remove_bbs = $conn->query($sql);

//업로드 된 파일삭제
$sql = "SELECT * FROM uploaded_file WHERE bbs_id = {$bbs_id}";
$result_select_file = $conn->query($sql);
if($result_select_file->num_rows > 0){
    while($row = $result_select_file->fetch_assoc()){
        $filename = $row['file_name'];
        unlink("../uploaded/{$filename}");
    }
}

//업로드 파일 table data 삭제
$sql = "DELETE FROM uploaded_file WHERE bbs_id={$bbs_id}";
$result_remove_uploaded_file_data = $conn->query($sql);

//댓글삭제
$sql = "DELETE FROM reply WHERE parent_bbs_id={$bbs_id}";
$result_remove_reply = $conn->query($sql);

if($result_remove_bbs == 1 && $result_remove_uploaded_file_data == 1 && $result_remove_reply){
    echo '1';
}
?>
