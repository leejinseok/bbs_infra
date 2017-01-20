<?php
function getReply($reply_id, $replyDomIdx, $reply_user_id, $reply_content, $is_have_remove_permission){
    if($is_have_remove_permission == 'true'){
        $del = "<a href='javascript:delReply(\"{$reply_id}\", $replyDomIdx)' style='float:right;'>삭제</a>";
    }

    $html = "
    <div class='row reply' id='reply-row-{$replyDomIdx}'>
        <div class='col-xs-2'>{$reply_user_id}</div>
        <div class='col-xs-10'>{$reply_content}{$del}</div>

    </div>";
    return $html;
}
?>
