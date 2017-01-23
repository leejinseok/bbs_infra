<!DOCTYPE html>
<html>
<?php
include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/partials/head.php";
include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/db/connection.php";
$sql = "SELECT a._id as _id, a.title as title, a.regdate as regdate, b.user_name as user_name FROM board as a join tb_users as b on a.user_id = b._id order by a.regdate desc ";
$result = $conn->query($sql);
?>
<body>
<div class="container home">
    <h2 class='text-center'>아미쿠스 게시판</h2>
    <table class='table '>
        <thead>
            <tr>
                <td>작성자</td>
                <td>제목</td>
                <td>작성일</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = $result->fetch_assoc()){?>
                <tr onclick="viewDetail(<?php echo $row['_id'];?>)" class='tr-article'>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['regdate']; ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <button type="button" class='btn btn-default' onclick="window.location.href='./bbs_write.php'">글쓰기</button>
</div>
</body>
</html>
