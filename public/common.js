function onSignIn(frm) {
    var user_id = frm.user_id.value;
    var pwd = frm.pwd.value;
    $.ajax({
        method:'post',
        url:"./lib/Login.php",
        data:{user_id:user_id, pwd:pwd},
        success : function(response){
            if(response == 'true'){
                window.location.href="./home.php";
            }
        },
        error : function(response){
            console.log(response);
        }
    })

    return false;
}
