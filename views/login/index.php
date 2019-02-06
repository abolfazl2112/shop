<?php

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
                <h1 class="title">ورود به حساب کاربری</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="subtitle">مشتری جدید هستم</h2>
                        <p><strong>ثبت نام حساب کاربری</strong></p>
                        <p>با ایجاد حساب کاربری میتوانید سریعتر خرید کرده، از وضعیت خرید خود آگاه شده و تاریخچه ی سفارشات خود را مشاهده کنید.</p>
                        <a href="<?=http()?>register" class="btn btn-primary">ادامه</a> </div>
                    <form method="post" class="col-sm-6">
                        <h2 class="subtitle">حساب کاربری دارم</h2>
                        <div class="form-group">
                            <input type="text" name="username" value="" placeholder="نام کاربری" id="input-username" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="" placeholder="رمز عبور" id="input-password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="ورود" class="btn btn-primary" />
                            <br />
                            <br />
                            <a href="<?=http()?>forgetpassword">رمز عبور خود را فراموش کرده ام!</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--Middle Part End -->
        </div>
    </div>
</div>
