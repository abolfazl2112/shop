<?php
include_once("../_layout/header.php");
include_once("../_layout/menu.php");

$cClass = new category();
$pClass = new product();
$cat = $cClass->getSubCategories(0);
$pro = $pClass->getNewProducts();

?>
<style>
    .title_carousel
    {
        position: absolute;
        bottom: 0px;
        background: #a1a0a099;
        color: #2c2b2e;
        width: 100%;
        padding: 3px;
    }
</style>
    <div class="carousel" data-flickity='{ "wrapAround": true }'>
        <a target="_self" class="carousel-cell">
            <img class="main-img" style="width: 100%;height: 100%;" src="<?=http()?>images/slider/1.jpg">
        </a>
        <a target="_self" class="carousel-cell">
            <img class="main-img" style="width: 100%;height: 100%;" src="<?=http()?>images/slider/2.jpg">
        </a>
        <a target="_self" class="carousel-cell">
            <img class="main-img" style="width: 100%;height: 100%;" src="<?=http()?>images/slider/3.jpg">
        </a>
    </div>
    <form action="#" style="margin:0px">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable" style="width:100%;">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="text8">
                <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder" style="width:100%;">
                <input class="mdl-textfield__input" type="text" id="text8">
                <label class="mdl-textfield__label" for="sample-expandable"></label>
            </div>
        </div>
    </form>
    <hr />

    <div class="carousel" data-flickity>
        <?php
        foreach ($cat as $item)
        {
            $len = strlen($item->subject);
            ?>
        <a target="_self" href="<?=http()?>webapp/category/?cid=<?=$item->id?>" class="carousel-cell1" style="text-decoration:none">
            <img class="main-img" style="width: 100%;height: 100%;" src="<?=http()."images/products/".$item->pic?>">
            <div class="title_carousel"><?=($len>47?substr($item->subject,0,47).'...':$item->subject)?></div>
        </a>
        <?php
        }
        ?>
    </div>
    <hr />
    <div class="carousel" data-flickity='{ "wrapAround": true }'>
        <a target="_self" class="carousel-cell">
            <img class="main-img" style="width: 100%;height: 100%;" src="<?=http()?>images/banner/2.jpg">
        </a>
    </div>


    <hr />
    <div class="carousel" data-flickity>
        <?php

        foreach ($pro as $item)
        {
            $len = strlen($item->subject);
            ?>
            <a target="_self" class="carousel-cell2">
                <img class="main-img" style="width: 100%;height: 100%;" src="<?=http()."images/products/".$item->picName?>">
                <div class="title_carousel"><?=($len>21?substr($item->subject,0,21).'...':$item->subject)?></div>
            </a>
        <?php
        }
        ?>

    </div>
    <hr />
<!--    <table border="0" style="width:100%">-->
<!--        <tbody>-->
<!--        <tr>-->
<!--            <td>-->
<!--                <a href="" target="_self" style="width:100%" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">-->
<!--                    <i class="material-icons">add</i>درخواست نمایندگی-->
<!--                </a>-->
<!--            </td>-->
<!--        </tr>-->
<!--        </tbody>-->
<!--    </table>-->
<!--    <hr />-->

<?php
include_once("../_layout/footer.php");
?>
