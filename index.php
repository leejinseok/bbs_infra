<!DOCTYPE html>
<html>
<?php include_once "{$_SERVER['DOCUMENT_ROOT']}/bbs_infra/partials/head.php"; ?>
<body>
    <br>
    <h2 class='text-center'>Amicuslex Board System Infra</h2>
    <div class="container index">
        <form onsubmit="return onSignIn(this)">
            <div class="form-group">
                <input type="text" name='user_id' class="form-control" id="exampleInputEmail1" placeholder="ID">
            </div>
            <div class="form-group">
                <input type="password" name='pwd' class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
<script type="text/javascript">
function onSignIn(frm) {
    var user_id = frm.user_id.value;
    var pwd = frm.pwd.value;
    $.ajax({
        method:'post',
        url:"./lib/Login.php",
        data:{user_id:user_id, pwd:pwd},
        success : function(response){
            console.log(response);
            if(response == 'true'){
                window.location.href="./home.php";
            }
        },
        error : function(response){
            console.log(response);
        }
    });
    return false;
}
</script>

</body>
</html>
