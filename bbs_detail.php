<!DOCTYPE html>
<html>
<?php
include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/partials/head.php";
include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/db/connection.php";
$sql = "SELECT * FROM board WHERE _id={$_GET['_id']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$parent_bbs_user_id = $row['user_id'];

$sql = "SELECT * FROM reply where parent_bbs_id = {$row['_id']}";
$result = $conn->query($sql);
?>
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<style media="screen">
.content{
    border:1px solid rgb(193, 193, 193);
    border-radius:5px;
    padding:12px;
}
</style>
<body>
<div class="container bbs-detail">

    <h2 class='text-left'>
        <?php echo $row['title'];?>
    </h2>
    <p>
        <?php echo $row['regdate']; ?>
    </p>

    <?php
    if( $parent_bbs_user_id == $_SESSION['ss__id'] || $_SESSION["ss_u_level"] == '99'){
        echo "<div style=''>
            <input type='button' value='수정' class='btn' onclick='updateBbs({$_GET['_id']})'/>
            <input type='button' value='삭제' class='btn btn-danger' onclick='removeBbs({$_GET['_id']})'/>
        </div>";
    }?>
    <hr>

    <div class="content" >
        <?php echo $row['content'];?>
    </div>

     <hr>
    <div class="container row list">
        <?php
        $i = 0;
        while($row2 = $result->fetch_assoc()){
            $is_reply_owner = 'false';
            $reply_user_id = $row2['user_id'];

            if($reply_user_id == $_SESSION['ss__id'] || $parent_bbs_user_id == $_SESSION['ss__id']){
                $is_reply_owner = 'true';
            }
        ?>
            <div class="row reply" id='reply-row-<?php echo $i;?>'>
                <div class='col-xs-2'><?php echo $row2['user_id'];?></div>
                <div class='col-xs-10'><?php echo $row2['content'];?>
                    <?php if($is_reply_owner=='true'){?>
                        <a href='javascript:delReply("<?php echo $row2['_id']?>", <?php echo $i;?>)' style='float:right;'>삭제</a>
                    <?php }?>
                </div>
            </div>
        <?php $i++; }?>
        <input type="hidden" id='replyIdx' value="<?php echo $i;?>">
    </div>

    <div class="container row edit ">
        <form onsubmit="return frmSubmit(this, 'reply')">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['ss__id'];?>">
            <input type="hidden" name="parent_bbs_id" value="<?php echo $row['_id'];?>">
            <div class="col-xs-9">
                <textarea class='form-control' name="content" value=""></textarea>
            </div>
            <div class="col-xs-3">
                <input class='form-control' type="submit" value="확인">
            </div>
        </form>
    </div>
</div>
</body>
</html>
