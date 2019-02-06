<?php
include_once("../../libs/include.all.php");

if(Session::IsLogin())
{
    header('location:'.http().'webapp/index');
    exit();
}
$flag = "";// SUCCESS - ERROR - INFO - WARNING
$message = "";
if(isset($_POST))
{
    $user = new user();
    if(isset($_POST['register']))
    {
        if(!empty($_POST['family']) &&
            !empty($_POST['mobile']) &&
            !empty($_POST['mobile'])
        )
        {
            $tbl_user = new tbl_user();
            $tbl_user->family = $_POST['family'];
            $tbl_user->name = $_POST['name'];
            $tbl_user->mobile = $_POST['mobile'];
            $tbl_user->active = 1;
            $tbl_user->password = rand(10000,99999);
            $tbl_user->username = $_POST['mobile'];

            if($user->getUserByMobile($tbl_user->mobile))
            {
                $flag="ERROR";
                $message = "شماره موبایل شما از قبل وجود دارد";
            }
            else
            {
                $userid=$user->signUp($tbl_user);
                if($userid)
                {
                    $flag="SUCCESS";
                    $message = "ثبت نام شما با موفقیت انجام شد.رمز عبور برای شما ارسال خواهد شد";
//                $sms = new kavenegarsms();
//                $sms->sendsms(sprintf(message::$sendSmsSuccessSignUp,$tbl_user->password),array($tbl_user->mobile));
                }
                else
                {
                    $flag="ERROR";
                    $message = "خطایی رخ داده است لطفا مجدد سعی کنید";
                }
            }

        }
        else
        {
            $flag="INFO";
            $message = "لطفا تمامی فیلدها رو پر کنید";
        }

    }
    else if(isset($_POST['login']))
    {
        if(!empty($_POST['mobile']) && !empty($_POST['password']))
        {
            $mobile = $_POST['mobile'];
            $pass = $_POST['password'];

            $isuser = $user->getUserByUsername($mobile);
            if($isuser && $isuser->password == $pass)
            {
                Session::LoginDo('uid',$isuser->id,$isuser->username);
                header('location:'.http().'webapp/index');
                exit();
            }
            else
            {
                $flag="ERROR";
                $message = "نام کاربری یا رمز عبور اشتباه است";
            }
        }
        else
        {
            $flag="INFO";
            $message = "لطفا تمامی فیلدها رو پر کنید";
        }
    }
}
?>
<html>
<head>
    <meta charset="utf8">
    <title> ورود به سلن شاپ</title>
    <link href="<?=http()?>template/selenshop/materialToast/mdtoast.css" type="text/css" rel="stylesheet"/>
    <link href="css/css.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<div class="form-structor">
    <form class="signup" method="post">
        <h2 class="form-title" id="signup"><span>یا</span> ثبت نام </h2>
        <div class="form-holder">
            <input type="text" name="name" class="input" placeholder="نام" />
            <input type="text" name="family" class="input" placeholder="نام خانوادگی *" />
            <input type="text" name="mobile" class="input" placeholder="موبایل *" />
        </div>
        <button class="submit-btn" name="register">ثبت نام</button>
    </form>
    <form method="post" class="login slide-up">
        <div class="center">
            <h2 class="form-title" id="login"><span>یا</span> ورود </h2>
            <div class="form-holder">
                <input type="text" name="mobile" class="input" placeholder="موبایل" />
                <input type="password" name="password" class="input" placeholder="رمز عبور" />
            </div>
            <button class="submit-btn" name="login">ورود</button>
        </div>
    </form>
</div>

<script src="js/js.js"></script>
<script src="<?=http()?>template/selenshop/js/jquery-2.1.1.min.js"></script>
<script src="<?=http()?>template/selenshop/materialToast/mdtoast.js"></script>

<?php
if($flag!="")
{
    ?>
    <script>
        $(document).ready(function(){
            $.mdtoast('<?=$message?>', { duration: 3000, type: $.mdtoast.type.<?=$flag?> });
        });
    </script>
<?php
}
?>

</body
</html
