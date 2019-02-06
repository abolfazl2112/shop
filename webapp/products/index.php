<?php
include_once("../_layout/header.php");
include_once("../_layout/menu.php");

if(isset($_GET['cid'])&&!empty($_GET['cid']))
    $parentId = $_GET['cid'];
else
    $parentId = 0;
if(isset($_GET['filter'])&&!empty($_GET['filter']))
    $filter = $_GET['filter'];
else
    $filter = '';

$categoryClass = new category();
$currentCategory = $categoryClass->getCategory($parentId);
$subcatList = $categoryClass->getSubCategories($parentId);

$productClass = new product();
if($parentId>0)
    $productList = $productClass->getProductInCategoryAndSubCategory($parentId);
else if($filter!='')
    $productList = $productClass->searchProducts($filter);
else
    $productList = $productClass->getProducts();
?>
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
<div class="row">

        <?php
        if(count($productList)<=0)
        {
            ?>
            <a href="<?=http().'webapp/products/'?>"
               class="mdl-button mdl-button--colored mdl-color--light-blue-600"
               style="text-underline-style: none;color: white;width: 100%">لیست کل محصولات</a>
            <?php
        }

        foreach($productList as $item)
        {
            if($item->picName=='' || !file_exists(get_path().'/images/products/'.$item->picName))
                $pic = http().'webapp/contents/images/noPic.jpg';
            else
                $pic = http().'images/products/'.$item->picName;

            $len = strlen($item->subject);
            ?>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
            <div class="mdl-card mdl-shadow--2dp demo-card-square">
                <div class="">
                    <div class="mdl-card__title mdl-card--expand" style="
                            /*background: url('*/<?//=$pic?>/*');*/
                            background-size: auto;
                            background-repeat: no-repeat;
                            background-position: center;
                            height: 250px;">
                        <img src="<?=$pic?>" style="width: 100%">

                    </div>
                    <h2 class="mdl-card__title-text"><?=($len>39?substr($item->subject,0,39).'...':$item->subject)?></h2>
                    <div class="mdl-card__actions mdl-card--border">
                        <div style="float: right">
                            <del style="color: red;"><?=$item->priceSelltmp.' '.$currentSetting->currency?></del>
                            <br>
                            <?=$item->priceSell.' '.$currentSetting->currency?>
                        </div>

                        <button type="button" class="addToCart mdl-button mdl-button--colored mdl-color--light-green-600 "
                           id="addToCart" data-product-id="<?=$item->id?>"
                           style="text-underline-style: none;color: white;float: left;"><i class="material-icons">add_shopping_cart</i>
                        </button>
                    </div>
                </div>
            </div>
    </div>
            <?php
        }
        ?>



</div>

<?php
include_once("../_layout/footer.php");
?>

