<!DOCTYPE html>
<html>
<?php
include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/partials/head.php";
include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/db/connection.php";
?>
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<style media="screen">
#wrapper{
    width: 90%;
    margin: auto;
}
</style>
<body>
<div class="container home">
    <h3 class='text-center'>아미쿠스 게시판 글쓰기</h3>
    <div class="row" id="wrapper">
        <form method="post" onsubmit="return submitForm(this)">
            <input type="hidden" id="_id" value="<?php echo $_SESSION['ss_w_id'];?>">
            <input type="hidden" id="bbs_id" value="<?php echo date('Ymdhis'); echo  $_SESSION['ss__id'];?>">
            <div class="form-group">
               <label for="exampleInputEmail1">제목</label>
               <input type="text" name='title' class="form-control" id="exampleInputEmail1" placeholder="제목">
             </div>
             <div class="form-group">
                <label for="summernote">내용</label>
                <textarea id="summernote" name='content'></textarea>
             </div>

            <input type="button" class='btn btn-primary' value='Submit' onclick='submitForm()' >
        </form>
        <br><br>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    // $('#summernote').summernote();
    $('#summernote').summernote({
        height: 590,
        focus: true,
        callbacks: {
            onImageUpload : function(file, editor, welEditable) {
                saveFile(file[0]);
            }
        }
    });
    function saveFile(file){
        data = new FormData();
        data.append("file", file);
        var bbs_id = $("#bbs_id").val();
        data.append('bbs_id',bbs_id);
        $.ajax({
            data: data,
            type: "POST",
            url: "./lib/upload_img.php",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                console.log(url);
                var $summernote = $("#summernote");
                var imgPath = url.name+"."+url.ext;
                var img = $("<img src='./uploaded/"+url+"' style='max-width:100%;'>")[0];
                $summernote.summernote('insertNode', img);
            },
            error : function(res){
                console.log(res);
            }
        });
    }
});

function submitForm() {
    var content = $('textarea[name="content"]').val();
    var title = $('input[name="title"]').val();
    var bbs_id = $("#bbs_id").val();
    $.ajax({
        type:'post',
        url:'./lib/Bbs_save.php',
        data : {content:content, title:title, bbs_id:bbs_id},
        success : function(response){
            console.log(response);
            if(response == '1'){
                alert('posting successfuly saved!');
                setTimeout(function(){
                    history.go(-1);
                },500)
            }
        },
        error : function(response){
            console.log(response);
        }
    })
    return false;
}
</script>
</body>
</html>
