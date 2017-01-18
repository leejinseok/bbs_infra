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

</body>
</html>
