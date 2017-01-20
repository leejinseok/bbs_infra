<!DOCTYPE html>
<html>
<?php
include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/partials/head.php";
include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/db/connection.php";
$sql = "SELECT * FROM board order by regdate";
$result = $conn->query($sql);


?>
<body>
<div class="container home">
    <h2 class='text-center'>아미쿠스 게시판</h2>
    <table class='table '>
        <thead>
            <tr>
                <td>title</td>
                <td>regdate</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = $result->fetch_assoc()){?>
                <tr onclick="viewDetail(<?php echo $row['_id'];?>)" class='tr-article'>
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
