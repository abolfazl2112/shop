<?php
include_once("../_layout/header.php");
include_once("../_layout/menu.php");
$categoryClass = new category();

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
    <div class="col-xs-12">
        <?php
        $subCatList = $categoryClass->getSubCategories(isset($_GET['cid']) && !empty($_GET['cid'])?$_GET['cid']:0);
        foreach($subCatList as $item)
        {
            ?>
            <div class="demo-card-square mdl-card mdl-shadow--2dp" style="width: 100%;float: none;height: 150px">
                <div class="mdl-card__title mdl-card--expand" style="background: url('<?=http()?>webapp/contents/images/noPic.jpg');background-size: cover;background-position: center">
                    <h2 class="mdl-card__title-text"><?=$item->subject?></h2>
                </div>

                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored" href="<?=http()?>webapp/products/?cid=<?=$item->id?>">لیست محصولات این دسته بندی</a>
                </div>
            </div>
            <?php
        }
        ?>


    </div>
</div>

<?php
include_once("../_layout/footer.php");
?>