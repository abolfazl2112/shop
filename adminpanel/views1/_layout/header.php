<?php
$userClass = new user();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>فروشگاه آنلاین</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=http_admin()?>template/dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="<?=http_admin()?>template/dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=http_admin()?>template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=http_admin()?>template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=http_admin()?>template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?=http_admin()?>template/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=http_admin()?>template/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=http_admin()?>template/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<?php
if(isset($_GET['url']))
{
    $url = $_GET['url'];
    $url = explode('/', $url);
}
else
    $url = '';
if($url!='' && ($url[0]=='login' || $url[0]=='register'))
{
?>
<body class="hold-transition login-page">
<div class="login-box">
<?php
}
else
{

    $adminID = Session::GetAdminLoginID();
    if(!isset($adminID) || empty($adminID))
    {
        header('location:'.http_admin().'login');
        exit();
    }
    $currentUser = $userClass->getUserById($adminID);
?>
<body class="hold-transition skin-red-light sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">پنل</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
<!--                    <li class="dropdown messages-menu">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                            <i class="fa fa-envelope-o"></i>-->
<!--                            <span class="label label-success">4</span>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li class="header">۴ پیام خوانده نشده</li>-->
<!--                            <li>-->
<!--                                 inner menu: contains the actual data-->
<!--                                <ul class="menu">-->
<!--                                    <li>-->
<!--                         start message-->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-right">-->
<!--                                                <img src="template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
<!--                                            </div>-->
<!--                                            <h4>-->
<!--                                                علیرضا-->
<!--                                                <small><i class="fa fa-clock-o"></i> ۵ دقیقه پیش</small>-->
<!--                                            </h4>-->
<!--                                            <p>متن پیام</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                     end message-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-right">-->
<!--                                                <img src="template/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                            </div>-->
<!--                                            <h4>-->
<!--                                                نگین-->
<!--                                                <small><i class="fa fa-clock-o"></i> ۲ ساعت پیش</small>-->
<!--                                            </h4>-->
<!--                                            <p>متن پیام</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-right">-->
<!--                                                <img src="template/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                            </div>-->
<!--                                            <h4>-->
<!--                                                نسترن-->
<!--                                                <small><i class="fa fa-clock-o"></i> امروز</small>-->
<!--                                            </h4>-->
<!--                                            <p>متن پیام</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-right">-->
<!--                                                <img src="template/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                            </div>-->
<!--                                            <h4>-->
<!--                                                نگین-->
<!--                                                <small><i class="fa fa-clock-o"></i> دیروز</small>-->
<!--                                            </h4>-->
<!--                                            <p>متن پیام</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <div class="pull-right">-->
<!--                                                <img src="template/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">-->
<!--                                            </div>-->
<!--                                            <h4>-->
<!--                                                نسترن-->
<!--                                                <small><i class="fa fa-clock-o"></i> ۲ روز پیش</small>-->
<!--                                            </h4>-->
<!--                                            <p>متن پیام</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="footer"><a href="#">نمایش تمام پیام ها</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <!-- Notifications: style can be found in dropdown.less -->
<!--                    <li class="dropdown notifications-menu">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                            <i class="fa fa-bell-o"></i>-->
<!--                            <span class="label label-warning">۱۰</span>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li class="header">۱۰ اعلان جدید</li>-->
<!--                            <li>-->
<!--                                 inner menu: contains the actual data-->
<!--                                <ul class="menu">-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-users text-aqua"></i> ۵ کاربر جدید ثبت نام کردند-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-warning text-yellow"></i> اخطار دقت کنید-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-users text-red"></i> ۴ کاربر جدید ثبت نام کردند-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-shopping-cart text-green"></i> ۲۵ سفارش جدید-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-user text-red"></i> نام کاربریتان را تغییر دادید-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="footer"><a href="#">نمایش همه</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <!-- Tasks: style can be found in dropdown.less -->
<!--                    <li class="dropdown tasks-menu">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                            <i class="fa fa-flag-o"></i>-->
<!--                            <span class="label label-danger">۹</span>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li class="header">۹ کار برای انجام دارید</li>-->
<!--                            <li>-->
<!--                                <ul class="menu">-->
<!--                                    <li>-->
                                        <!-- Task item -->
<!--                                        <a href="#">-->
<!--                                            <h3>-->
<!--                                                ساخت دکمه-->
<!--                                                <small class="pull-left">20%</small>-->
<!--                                            </h3>-->
<!--                                            <div class="progress xs">-->
<!--                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"-->
<!--                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
<!--                                                    <span class="sr-only">20% تکمیل شده</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <h3>-->
<!--                                                ساخت قالب جدید-->
<!--                                                <small class="pull-left">40%</small>-->
<!--                                            </h3>-->
<!--                                            <div class="progress xs">-->
<!--                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"-->
<!--                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
<!--                                                    <span class="sr-only">40% تکمیل شده</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <h3>-->
<!--                                                تبلیغات-->
<!--                                                <small class="pull-left">60%</small>-->
<!--                                            </h3>-->
<!--                                            <div class="progress xs">-->
<!--                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"-->
<!--                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
<!--                                                    <span class="sr-only">60% تکمیل شده</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <h3>-->
<!--                                                ساخت صفحه فرود-->
<!--                                                <small class="pull-left">80%</small>-->
<!--                                            </h3>-->
<!--                                            <div class="progress xs">-->
<!--                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"-->
<!--                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
<!--                                                    <span class="sr-only">80% تکمیل شده</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="footer">-->
<!--                                <a href="#">نمایش همه</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?=http_admin()?>template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?=$currentUser->name.' '.$currentUser->family?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?=http_admin()?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
<?=$currentUser->name.' '.$currentUser->family?>
                                    <small>مدیریت سایت</small>
                                </p>
                            </li>
<!--                            <li class="user-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-xs-4 text-center">-->
<!--                                        <a href="#">صفحه من</a>-->
<!--                                    </div>-->
<!--                                    <div class="col-xs-4 text-center">-->
<!--                                        <a href="#">فروش</a>-->
<!--                                    </div>-->
<!--                                    <div class="col-xs-4 text-center">-->
<!--                                        <a href="#">دوستان</a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
<!--                                    <a href="--><?//=http_admin()?><!--profile" class="btn btn-default btn-flat">پروفایل</a>-->
                                </div>
                                <div class="pull-left">
                                    <a href="<?=http_admin()?>logout" class="btn btn-default btn-flat">خروج</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
<!--                    <li>-->
<!--                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
<!--                    </li>-->
                </ul>
            </div>
        </nav>
    </header>
    <?=include_once 'right.php';?>
<?php
}
?>