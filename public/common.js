function viewDetail(_id) {
    window.location.href='./bbs_detail.php?_id='+_id;
}
function removeBbs(_id) {
    if(confirm("해당 게시글을 삭제하시겠습니까?")){
        $.ajax({
            url:"./lib/Bbs_remove.php",
            type:'post',
            data:{bbs_id:_id},
            success : function(response){
                if(response == '1'){
                    window.location.href='./home.php';
                }
            }
        })
    }

}
function updateBbs(_id) {
    window.location.href='./bbs_update.php?bbs_id='+_id;
}
function frmSubmit(frm,type){
    if(type='reply'){
        var replyIdx = $("#replyIdx").val();
        var content = frm.content.value;
        var user_id = frm.user_id.value;
        var parent_bbs_id = frm.parent_bbs_id.value;
        var data = {
            content: content,
            user_id: user_id,
            parent_bbs_id: parent_bbs_id,
            replyIdx:replyIdx
        }
        $.ajax({
            type:'post',
            data:data,
            url:'./lib/Reply_save.php',
            success : function(response){
                    $(".container.row.list").append(response);
            },
            error : function(response){
                console.log(response);
            }
        })
        return false;
    }
}

function delReply(_id, elIdx) {
    $.ajax({
        type:'post',
        data:{_id:_id},
        url:'./lib/Reply_remove.php',
        success : function(response){
            console.log(response);
            if(response == 1){
                alert('reply removed successfully!!');
                $("#reply-row-"+elIdx).remove();
            }
        },
        error : function(response){
            console.log(response);
        }
    })
}
