<?php
if(
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['mobile']) && !empty($_POST['mobile'])
)
{
    $userClass = new user();
    $user = $userClass->getUserByUsername($_POST['username']);
    if($user && $user->mobile == $_POST['mobile'])
    {
        $sms=new SMSPANEL();
        $mobile_array = array($user->mobile);
        $sms->send_sms('سلن شاپ. رمز عبور شما : '.$user->password,$mobile_array);
        $_SESSION['error']= 1;
        $_SESSION['error_message']= 'رمز عبور با موفقیت ارسال گردید';
        exit();
    }
    else
    {
        $_SESSION['error']= 1;
        $_SESSION['error_message']= 'نام کاربری یا شماره موبایل اشتباه است';
    }
}
?>

<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="<?=http()?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?=http()?>login">ورود</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <?php
            if(isset($_SESSION['error'])&&!empty($_SESSION['error']))
            {
                ?>
                <label class="alert alert-<?=$_SESSION['error']?> " style="display: block;"><?=$_SESSION['error_message']?></label>
                <?php
                unset($_SESSION['error']);
                unset($_SESSION['error_message']);
            }
            ?>
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h1 class="title">رمز خود را فراموش کرده ام</h1>
                <div class="row">
                    <form method="post" class="col-sm-12">
                        <h2 class="subtitle"></h2>
                        <div class="form-group">
                            <input type="text" name="username" value="" placeholder="نام کاربری" id="input-username" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile" value="" placeholder="موبایل" id="input-password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="ارسال رمز عبور" class="btn btn-primary" />
                            <br />
                            <br />
                            <a href="<?=http()?>login">ورود به سایت!</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--Middle Part End -->
        </div>
    </div>
</div>
