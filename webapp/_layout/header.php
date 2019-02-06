<?php
include_once("../../libs/include.all.php");
if(!Session::IsLogin())
{
    header('location:'.http().'webapp/login');
    exit();
}
$userName= Session::GetUserLogin();
$userClass = new user();
$currentUser = $userClass->getUserByUsername($userName);

$setting = new setting();
$currentSetting=$setting->getSetting(1);

?>
<html dir="rtl">
<head>
    <title>سلن شاپ - سوپر مارکت آنلاین</title>
    <meta charset="utf-8" />

    <!--pre load content of page-->
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>-->
<!--    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>-->
<!--    <script src="/webapp/contents/js/loadingImg.js"></script>-->


    <script src="<?=http()?>webapp/contents/js/jquery-1.10.2.js"></script>
    <script>
        //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });

        //$(function () {
        //    $('img').imgPreload()
        //})

    </script>
    <link href="<?=http()?>webapp/contents/css/bootstrap.css" rel="stylesheet" />
    <link href="<?=http()?>webapp/contents/css/material.css" rel="stylesheet" />
<!--    <link href="--><?//=http()?><!--webapp/contents/css/materialize.min.css" rel="stylesheet" />-->
    <link href="<?=http()?>webapp/contents/css/menu.css" rel="stylesheet" />
    <script src="<?=http()?>webapp/contents/js/material.js"></script>

    <link href="<?=http()?>webapp/contents/css/flickity.css" rel="stylesheet" />
    <script src="<?=http()?>webapp/contents/js/flickity.pkgd.js"></script>
    <link href="<?=http()?>webapp/contents/css/materialcss.css" rel="stylesheet" />

    <link href="<?=http()?>template/selenshop/materialToast/mdtoast.css" type="text/css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript,if it's not present, don't show loader */
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(<?=http()?>webapp/contents/images/loading/ajax-loader2.gif) center no-repeat transparent;
        }
    </style>
</head>
<body>
<div class="se-pre-con"></div>
<!-- The drawer is always open in large screens. The header is always shown,  even in small screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs" style="left:0px;right:0px">
    <header class="mdl-layout__header" >
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">سلن شاپ</span>
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation -->
            <nav class="mdl-navigation">
                <a target="_self" class="mdl-navigation__link" href="<?=http()?>webapp/basket">
                    <i class="material-icons">shopping_basket</i>
                    <span class="basket-counter"></span>
                </a>
<!--                <a target="_self" class="mdl-navigation__link" href=""><i class="material-icons">arrow_back</i></a>-->
            </nav>
        </div>
        <!-- Tabs -->
    </header>


