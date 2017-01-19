<!DOCTYPE html>
<html>
<?php include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/partials/head.php"; ?>
<?php
    include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/db/connection.php";
?>
<body>
<div class="container home">
    <h2 class='text-center'>Home page</h2>
    <div class="panel">

    </div>
    <button type="button" class='btn btn-default' onclick="window.location.href='./bbs_write.php'">글쓰기</button>
</div>
</body>
</html>
