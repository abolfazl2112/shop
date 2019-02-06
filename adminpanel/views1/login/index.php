<?php

?>


<div class="login-logo">
    <a href="#"><img src="<?=http_admin()?>template/dist/img/avatar5.png"></a>
</div>
<!-- /.login-logo -->
<div class="login-box-body">
    <p class="login-box-msg">ورود به مدیریت</p>

    <form action="" method="post">
        <div class="form-group has-feedback">
            <input name="username" type="text" class="form-control" placeholder="نام کاربری">
        </div>
        <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="رمز عبور">
        </div>
        <div class="row">
            <?php
            if(isset($_SESSION['error']) && $_SESSION['error']==1)
            {
                ?>
                <div class="col-xs-12">
                        <label class="alert alert-error">
                            <?=$_SESSION['error_message']?>
                        </label>
                </div>
            <?php
                unset($_SESSION['error']);
                unset($_SESSION['error_message']);
            }
            ?>

            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

<!--    <div class="social-auth-links text-center">-->
<!--        <p>- یا -</p>-->
<!--        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> ورود با فیسبوک</a>-->
<!--        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> ورود با گوگل</a>-->
<!--    </div>-->
    <!-- /.social-auth-links -->

<!--    <a href="#">رمز عبورم را فراموش کرده ام.</a><br>-->
<!--    <a href="register.html" class="text-center">ثبت نام</a>-->

</div>