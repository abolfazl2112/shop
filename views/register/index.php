<?php

if(!empty($_POST) &&
    isset($_POST['mobile']) && !empty($_POST['mobile']) &&
    isset($_POST['address']) && !empty($_POST['address']) &&
    isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['family']) && !empty($_POST['family'])
)
{
    $userClass = new user();
    $tblUser = new tbl_user();
    $tblUser->mobile = $_POST['mobile'];
    $tblUser->username = $_POST['mobile'];
    $tblUser->password = rand(10000,99999);
    $tblUser->address = $_POST['address'];
    $tblUser->name = $_POST['name'];
    $tblUser->family = $_POST['family'];
    $tblUser->active=1;

    if($userClass->getUserByUsername($tblUser->username))
    {
        $_SESSION['error']= 1;
        $_SESSION['error_message']= 'این نام کاربری قبلا ثبت شده است';
    }

    if($userClass->getUserByMobile($tblUser->mobile))
    {
        $_SESSION['error']= 1;
        $_SESSION['error_message']= 'این شماره موبایل قبلا ثبت شده است';
    }

    $x=$userClass->signUp($tblUser);
    if($x>0)
    {
        $sms = new kavenegarsms();
        $sms->sendsms(sprintf(message::$sendSmsSuccessSignUp,$tblUser->password),array($tblUser->mobile));
        $_SESSION['error']= 1;
        $_SESSION['error_message']= 'ثبت نام شما با موفقیت انجام شد.اطلاعات ورود به سایت و اپلیکیشن موبایل برای شما ارسال می شود.';
    }
    else
    {
        $_SESSION['error']= 1;
        $_SESSION['error_message']= 'خطا در ثبت نام کاربر';
    }
}

?>
<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="<?=http()?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?=http()?>login">حساب کاربری</a></li>
            <li><a href="<?=http()?>register">ثبت نام</a></li>
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
            <div class="col-sm-12" id="content">
                <h1 class="title">حساب کاربری جدید</h1>
                <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید به <a href="<?=http()?>login">صفحه ورود</a> مراجعه نمایید.</p>
                <form class="form-horizontal" method="post">
                    <fieldset id="account">
                        <legend>اطلاعات شخصی شما</legend>
                        <div style="display: none;" class="form-group required">
                            <label class="col-sm-2 control-label">گروه مشتری</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="1" name="customer_group_id">
                                        پیشفرض</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-name" class="col-sm-2 control-label">نام</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-name" placeholder="نام " value="" name="name">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-lastname" class="col-sm-2 control-label"> نام خانوادگی</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="input-lastname" placeholder="نام خانوادگی" value="" name="family">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-mobile" class="col-sm-2 control-label">موبایل</label>
                            <div class="col-sm-10">
                                <input type="text" required maxlength="11" class="form-control" id="input-mobile" placeholder="موبایل" value="" name="mobile">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-telephone" class="col-sm-2 control-label">شماره تلفن</label>
                            <div class="col-sm-10">
                                <input type="text" required maxlength="11" class="form-control" id="input-tell" placeholder="شماره تلفن" value="" name="tell">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-address" class="col-sm-2 control-label">آدرس</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" required id="input-address" name="address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
<!--                            <label for="input-address" class="col-sm-2 control-label"></label>-->
                            <div class="col-sm-12">
                                <input type="checkbox" value="1" checked="checked" name="agree">
                                &nbsp;من <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق هستم</a> &nbsp;
                            </div>
                        </div>

                    </fieldset>
<!--                    <fieldset>-->
<!--                        <legend>کد امنیتی</legend>-->
<!--                        <div class="form-group required">-->
<!--                            <label for="input-confirm" class="col-sm-2 control-label">کلمه امنیتی</label>-->
<!--                            <div class="col-sm-10">-->
<!--                                <input type="text" class="form-control" id="input-confirm" placeholder="" value="" name="capcha">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </fieldset>-->
                    <div class="buttons">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-primary" value="ثبت نام">
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End -->

        </div>
    </div>
</div>
