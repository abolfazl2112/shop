<?php
$categoryClass = new category();
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?=http()?>images/favicon.png" rel="icon" />
    <title><?=$currentSetting->name?></title>
    <meta name="description" content="<?=$currentSetting->description?>">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="<?=http()?>template/selenshop/js/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=http()?>template/selenshop/js/bootstrap/css/bootstrap-rtl.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=http()?>template/selenshop/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=http()?>template/selenshop/css/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="<?=http()?>template/selenshop/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?=http()?>template/selenshop/css/owl.transitions.css" />
    <link rel="stylesheet" type="text/css" href="<?=http()?>template/selenshop/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?=http()?>template/selenshop/css/stylesheet-rtl.css" />
    <link rel="stylesheet" type="text/css" href="<?=http()?>template/selenshop/css/responsive-rtl.css" />
    <link rel="stylesheet" type="text/css" href="<?=http()?>template/selenshop/css/stylesheet-skin4.css" />

    <!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
    <div id="header">
        <!-- Top Bar Start-->
        <nav id="top" class="htop">
            <div class="container">
                <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
                    <div class="pull-left flip left-top">
                        <div class="links">
                            <ul>
                                <li class="mobile"><i class="fa fa-phone"></i><?=$currentSetting->tell?></li>
                                <li class="email"><a href="#"><i class="fa fa-envelope"></i><?=$currentSetting->email?></a></li>
<!--                                <li class="wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی<b></b></a>-->
<!--                                    <div class="dropdown-menu custom_block">-->
<!--                                        <ul>-->
<!--                                            <li>-->
<!--                                                <table>-->
<!--                                                    <tbody>-->
<!--                                                    <tr>-->
<!--                                                        <td><img alt="" src="--><?//=http()?><!--images/banner/cms-block.jpg"></td>-->
<!--                                                        <td><img alt="" src="--><?//=http()?><!--images/banner/responsive.jpg"></td>-->
<!--                                                    </tr>-->
<!--                                                    <tr>-->
<!--                                                        <td><h4>بلاک های محتوا</h4></td>-->
<!--                                                        <td><h4>قالب واکنش گرا</h4></td>-->
<!--                                                    </tr>-->
<!--                                                    <tr>-->
<!--                                                        <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>-->
<!--                                                        <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>-->
<!--                                                    </tr>-->
<!--                                                    <tr>-->
<!--                                                        <td><strong><a class="btn btn-default btn-sm" href="#">ادامه مطلب</a></strong></td>-->
<!--                                                        <td><strong><a class="btn btn-default btn-sm" href="#">ادامه مطلب</a></strong></td>-->
<!--                                                    </tr>-->
<!--                                                    </tbody>-->
<!--                                                </table>-->
<!--                                            </li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li><a href="#">لیست علاقه مندی (0)</a></li>-->
<!--                                <li><a href="#">تسویه حساب</a></li>-->
                            </ul>
                        </div>
<!--                        <div id="language" class="btn-group">-->
<!--                            <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> <img src="--><?//=http()?><!--images/flags/gb.png" alt="انگلیسی" title="انگلیسی">انگلیسی <i class="fa fa-caret-down"></i></span></button>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li>-->
<!--                                    <button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="--><?//=http()?><!--images/flags/gb.png" alt="انگلیسی" title="انگلیسی" /> انگلیسی</button>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="--><?//=http()?><!--images/flags/ar.png" alt="فارسی" title="فارسی" /> فارسی</button>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        <div id="currency" class="btn-group">-->
<!--                            <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> تومان <i class="fa fa-caret-down"></i></span></button>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li>-->
<!--                                    <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <button class="currency-select btn btn-link btn-block" type="button" name="USD">$ USD</button>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
                    </div>
                    <div id="top-links" class="nav pull-right flip">
                        <?php
                        if(!session::IsLogin())
                        {
                            ?>
                            <ul>
                                <li><a href="<?=http()?>login">ورود</a></li>
                                <li><a href="<?=http()?>register">ثبت نام</a></li>
                            </ul>
                        <?php
                        }
                        else
                        {
                            ?>
                            <ul>
                                <li><a href="<?=http()?>logout">خروج</a></li>
                                <li><a href="<?=http()?>myorders">سفارشات من</a></li>

                            </ul>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </nav>
        <!-- Top Bar End-->
        <!-- Header Start-->
        <header class="header-row">
            <div class="container">
                <div class="table-container">
                    <!-- Logo Start -->
                    <div class="col-table-cell col-lg-4 col-md-4 col-sm-12 col-xs-12 inner">
                        <div id="logo">
                            <a href="<?=http()?>">
                                <img style="width: 100px" class="img-responsive" src="<?=http()?>images/logo.png" title="سلن شاپ - اولین سوپر آنلاین مارکت گناباد" alt="سلن شاپ - اولین سوپر آنلاین مارکت گناباد" />
                            </a>
                        </div>
                    </div>
                    <!-- Logo End -->
                    <!-- جستجو Start-->
                    <div class="col-table-cell col-lg-5 col-md-5 col-md-push-0 col-sm-6 col-sm-push-6 col-xs-12">
                        <form id="search" method="get" action="<?=http()?>categories" class="input-group">
                            <input id="filter_name" type="text" name="filter" value="" placeholder="جستجو" class="form-control input-lg" />
                            <button type="submit" class="button-search"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- جستجو End-->
                    <!-- Mini Cart Start-->
                    <div class="col-table-cell col-lg-3 col-md-3 col-md-pull-0 col-sm-6 col-sm-pull-6 col-xs-12 inner">
                        <div id="cart">
                            <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..." class="heading dropdown-toggle">
                                <span class="cart-icon pull-left flip"></span>
<!--                                <span id="cart-total">2 آیتم - 132000 تومان</span>-->
                                <span id="cart-totals">
                                    سبد خرید
                                    (
                                    <span class="badge-counter"></span>
                                    )
                                </span>
                            </button>
                            <ul class="dropdown-menu">
<!--                                <li>-->
<!--                                    <table class="table">-->
<!--                                        <tbody>-->
<!--                                        <tr>-->
<!--                                            <td class="text-center"><a href="#"><img class="img-thumbnail" title="کفش راحتی مردانه" alt="کفش راحتی مردانه" src="--><?//=http()?><!--images/product/sony_vaio_1-50x50.jpg"></a></td>-->
<!--                                            <td class="text-left"><a href="#">کفش راحتی مردانه</a></td>-->
<!--                                            <td class="text-right">x 1</td>-->
<!--                                            <td class="text-right">32000 تومان</td>-->
<!--                                            <td class="text-center"><button class="btn btn-danger btn-xs remove" title="حذف" onClick="" type="button"><i class="fa fa-times"></i></button></td>-->
<!--                                        </tr>-->
<!--                                        <tr>-->
<!--                                            <td class="text-center"><a href="#"><img class="img-thumbnail" title="تبلت ایسر" alt="تبلت ایسر" src="--><?//=http()?><!--images/product/samsung_tab_1-50x50.jpg"></a></td>-->
<!--                                            <td class="text-left"><a href="#">تبلت ایسر</a></td>-->
<!--                                            <td class="text-right">x 1</td>-->
<!--                                            <td class="text-right">98000 تومان</td>-->
<!--                                            <td class="text-center"><button class="btn btn-danger btn-xs remove" title="حذف" onClick="" type="button"><i class="fa fa-times"></i></button></td>-->
<!--                                        </tr>-->
<!--                                        </tbody>-->
<!--                                    </table>-->
<!--                                </li>-->
                                <li>
                                    <div>
<!--                                        <table class="table table-bordered">-->
<!--                                            <tbody>-->
<!--                                            <tr>-->
<!--                                                <td class="text-right"><strong>جمع کل</strong></td>-->
<!--                                                <td class="text-right">132000 تومان</td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td class="text-right"><strong>کسر هدیه</strong></td>-->
<!--                                                <td class="text-right">4000 تومان</td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td class="text-right"><strong>مالیات</strong></td>-->
<!--                                                <td class="text-right">11880 تومان</td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td class="text-right"><strong>قابل پرداخت</strong></td>-->
<!--                                                <td class="text-right">139880 تومان</td>-->
<!--                                            </tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->
                                        <p class="checkout">
                                            <a href="<?=http()?>basket" class="btn btn-primary">
                                                <i class="fa fa-shopping-cart"></i> مشاهده سبد</a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="<?=http()?>invoce" class="btn btn-primary">
                                                <i class="fa fa-share"></i> تسویه حساب</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mini Cart End-->
                </div>
            </div>
        </header>
        <!-- Header End-->
        <!-- Main آقایانu Start-->
        <nav id="menu" class="navbar">
            <div class="container">
                <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="home_link" title="صفحه اصلی" href="<?=http()?>"><span>صفحه اصلی</span></a></li>
                        <?php

                        foreach ($categoryClass->getSubCategories(0) as $item)
                        {
                        ?>
                        <li class="contact-link">

                        </li>

                        <li class="dropdown information-link">
                            <a href="<?= http() ?>categories?id=<?= $item->id ?>"><?= $item->subject ?></a>
                            <div class="dropdown-menu">
                                <ul>
                                    <?php
                                    foreach ($categoryClass->getSubCategories($item->id) as $subitem)
                                    {
                                        ?>
                                        <li>
                                            <a href="<?= http() ?>categories?id=<?= $subitem->id ?>"><?= $subitem->subject ?></a>
                                        </li>
                                        <?php
                                    }
                                        ?>
                                    </ul>
                                </div>
                            </li>
                        <?php
                        }
                        ?>


                        <li class="contact-link"><a href="<?=http().'contactus'?>">تماس با ما</a></li>
<!--                        <li class="dropdown">-->
<!--                            <a href="--><?//=http()?><!--categories">دسته بندی</a>-->
<!--                            <div class="dropdown-menu">-->
<!--                                <ul>-->
<!--                                    --><?php
//                                    $categoryList = $categoryClass->getCategories();
//                                    foreach ($categoryList as $item)
//                                    {
//                                        $subCat = $categoryClass->getSubCategories($item->id);
//                                        ?>
<!--                                        <li>-->
<!--                                            <a href="#">-->
                                                <?php
//                                                echo $item->subject;
                                                ?>
<!--                                                --><?php
//                                                if($subCat)
//                                                {
//                                                ?>
<!--                                                    <span>&rsaquo;</span>-->
<!--                                                --><?php
//                                                }
//                                                ?>
<!--                                            </a>-->
<!--                                            --><?php
//
//                                            if($subCat)
//                                            {
//                                                ?>
<!--                                                <div class="dropdown-menu">-->
<!--                                                    <ul>-->
<!--                                                        --><?php
//
//                                                        foreach ($subCat as $subitem)
//                                                        {
//                                                            ?>
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
                                                                    <?php
//                                                                    echo $subitem->subject;
                                                                    ?>
                                                                    <!--                                                                <span>&rsaquo;</span>-->
<!--                                                                </a>-->
                                                                <!--                                                        <div class="dropdown-menu">-->
                                                                <!--                                                            <ul>-->
                                                                <!--                                                                <li><a href="#">زیردسته ها</a></li>-->
                                                                <!--                                                                <li><a href="#">زیردسته ها</a></li>-->
                                                                <!--                                                                <li><a href="#">زیردسته ها</a></li>-->
                                                                <!--                                                                <li><a href="#">زیردسته ها</a></li>-->
                                                                <!--                                                                <li><a href="#">زیردسته جدید</a></li>-->
                                                                <!--                                                            </ul>-->
                                                                <!--                                                        </div>-->
<!--                                                            </li>-->
<!--                                                            --><?php
//                                                        }
//                                                        ?>
<!--                                                    </ul>-->
<!--                                                </div>-->
<!--                                            --><?php
//                                            }
//                                            ?>
<!---->
<!--                                        </li>-->
<!--                                    --><?php
//                                    }
//                                    ?>
<!---->
<!--                                </ul>-->
<!--                            </div>-->

<!--                        </li>-->
<!--                        <li class="menu_brands dropdown"><a href="#">برند ها</a>-->
<!--                            <div class="dropdown-menu">-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/apple_logo-60x60.jpg" title="اپل" alt="اپل" /></a><a href="#">اپل</a></div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/canon_logo-60x60.jpg" title="کنون" alt="کنون" /></a><a href="#">کنون</a></div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"> <a href="#"><img src="--><?//=http()?><!--images/product/hp_logo-60x60.jpg" title="اچ پی" alt="اچ پی" /></a><a href="#">اچ پی</a></div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/htc_logo-60x60.jpg" title="اچ تی سی" alt="اچ تی سی" /></a><a href="#">اچ تی سی</a></div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/palm_logo-60x60.jpg" title="پالم" alt="پالم" /></a><a href="#">پالم</a></div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/sony_logo-60x60.jpg" title="سونی" alt="سونی" /></a><a href="#">سونی</a> </div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/canon_logo-60x60.jpg" title="test" alt="test" /></a><a href="#">تست</a> </div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/apple_logo-60x60.jpg" title="test 3" alt="test 3" /></a><a href="#">تست 3</a></div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/canon_logo-60x60.jpg" title="test 5" alt="test 5" /></a><a href="#">تست 5</a> </div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/canon_logo-60x60.jpg" title="test 6" alt="test 6" /></a><a href="#">تست 6</a></div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/apple_logo-60x60.jpg" title="test 7" alt="test 7" /></a><a href="#">تست 7</a> </div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/canon_logo-60x60.jpg" title="test1" alt="test1" /></a><a href="#">تست1</a></div>-->
<!--                                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="--><?//=http()?><!--images/product/apple_logo-60x60.jpg" title="test2" alt="test2" /></a><a href="#">تست2</a></div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="custom-link"><a href="#">لینک های دلخواه</a></li>-->
<!--                        <li class="dropdown wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی</a>-->
<!--                            <div class="dropdown-menu custom_block">-->
<!--                                <ul>-->
<!--                                    <li>-->
<!--                                        <table>-->
<!--                                            <tbody>-->
<!--                                            <tr>-->
<!--                                                <td><img alt="" src="--><?//=http()?><!--images/banner/cms-block.jpg"></td>-->
<!--                                                <td><img alt="" src="--><?//=http()?><!--images/banner/responsive.jpg"></td>-->
<!--                                                <td><img alt="" src="--><?//=http()?><!--images/banner/cms-block.jpg"></td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td><h4>بلاک های محتوا</h4></td>-->
<!--                                                <td><h4>قالب واکنش گرا</h4></td>-->
<!--                                                <td><h4>پشتیبانی ویژه</h4></td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>-->
<!--                                                <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>-->
<!--                                                <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>-->
<!--                                                <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>-->
<!--                                                <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>-->
<!--                                            </tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="dropdown information-link"><a>برگه ها</a>-->
<!--                            <div class="dropdown-menu">-->
<!--                                <ul>-->
<!--                                    <li><a href="#">ورود</a></li>-->
<!--                                    <li><a href="#">ثبت نام</a></li>-->
<!--                                    <li><a href="#">دسته بندی (شبکه/لیست)</a></li>-->
<!--                                    <li><a href="#">محصولات</a></li>-->
<!--                                    <li><a href="#">سبد خرید</a></li>-->
<!--                                    <li><a href="#">تسویه حساب</a></li>-->
<!--                                    <li><a href="#">مقایسه</a></li>-->
<!--                                    <li><a href="#">لیست آرزو</a></li>-->
<!--                                    <li><a href="#">جستجو</a></li>-->
<!--                                </ul>-->
<!--                                <ul>-->
<!--                                    <li><a href="#">درباره ما</a></li>-->
<!--                                    <li><a href="#">404</a></li>-->
<!--                                    <li><a href="#">عناصر</a></li>-->
<!--                                    <li><a href="#">سوالات متداول</a></li>-->
<!--                                    <li><a href="#">نقشه سایت</a></li>-->
<!--                                    <li><a href="#">تماس با ما</a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </li>-->

<!--                        <li class="custom-link-right"><a href="#" target="_blank">پیشنهاد های ویژه</a></li>-->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main آقایانu End-->
    </div>