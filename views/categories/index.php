
<?php
if(isset($_GET['id'])&&!empty($_GET['id']))
{
    $parentId = $_GET['id'];
}
else
    $parentId = 0;

if(isset($_GET['filter'])&&!empty($_GET['filter']))
{
    $filter = $_GET['filter'];
}
else
    $filter = '';

$categoryClass = new category();
$currentCategory = $categoryClass->getCategory($parentId);
$subcatList = $categoryClass->getSubCategories($parentId);

$productClass = new product();
if($parentId>0)
    {
//        echo '<br>getProductInCategoryAndSubCategory<br>';
        $productList = $productClass->getProductInCategoryAndSubCategory($parentId);
    }
    else if($filter!='')
    {
        $productList = $productClass->searchProducts($filter);
    }

else
    $productList = $productClass->getProducts();

?>
<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="<?=http()?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?=http().'categories'.($currentCategory?'?id='.$currentCategory->id:'')?>"><?=($currentCategory?$currentCategory->subject:'دسته بندی ها')?></a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Left Part Start -->
            <aside id="column-left" class="col-sm-3 hidden-xs">
                <h3 class="subtitle">دسته بندی</h3>
                <div class="box-category">
                    <ul id="cat_accordion">
                        <?php
                        $catList = $categoryClass->getSubCategories(0);
                        foreach ($catList as $item)
                        {
                            ?>
                            <li>
                                <a href="<?=http()?>categories?id=<?=$item->id?>"><?=$item->subject?></a> <span class="down"></span>
                                <ul>
                                    <?php
                                    $subList = $categoryClass->getSubCategories($item->id);
                                    foreach ($subList as $row) {
                                    ?>
                                    <li><a href="<?=http()?>categories?id=<?=$row->id?>"><?=$row->subject?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
                <h3 style="display: none" class="subtitle">پرفروش ها</h3>
                <div  style="display: none" class="side-item">
                    <div class="product-thumb clearfix">
                        <div class="image"><a href="product.html"><img src="<?=http()?>images/products/apple_cinema_30-50x50.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">تی شرت کتان مردانه</a></h4>
                            <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span></p>
                        </div>
                    </div>
                    <div class="product-thumb clearfix">
                        <div class="image"><a href="product.html"><img src="<?=http()?>images/products/iphone_1-50x50.jpg" alt="آیفون 7" title="آیفون 7" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">آیفون 7</a></h4>
                            <p class="price"> 2200000 تومان </p>
                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                        </div>
                    </div>
                    <div class="product-thumb clearfix">
                        <div class="image"><a href="product.html"><img src="<?=http()?>images/products/macbook_1-50x50.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">آیدیا پد یوگا</a></h4>
                            <p class="price"> 900000 تومان </p>
                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                        </div>
                    </div>
                    <div class="product-thumb clearfix">
                        <div class="image"><a href="product.html"><img src="<?=http()?>images/products/sony_vaio_1-50x50.jpg" alt="کفش راحتی مردانه" title="کفش راحتی مردانه" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">کفش راحتی مردانه</a></h4>
                            <p class="price"> <span class="price-new">32000 تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-25%</span> </p>
                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                        </div>
                    </div>
                    <div class="product-thumb clearfix">
                        <div class="image"><a href="product.html"><img src="<?=http()?>images/products/FinePix-Long-Zoom-Camera-50x50.jpg" alt="دوربین فاین پیکس" title="دوربین فاین پیکس" class="img-responsive" /></a></div>
                        <div class="caption">
                            <h4><a href="product.html">دوربین فاین پیکس</a></h4>
                            <p class="price">122000 تومان</p>
                        </div>
                    </div>
                </div>
                <h3 class="subtitle">جدیدترین ها</h3>
                <div class="side-item">
                    <?php
                    $newProducts = $productClass->getNewProducts(10);
                    foreach ($newProducts as $item)
                    {
                        ?>
                        <div class="product-thumb clearfix">
                            <div class="image">
                                <a href="<?=http().'products?id='.$item->id?>"><img src="<?=http()?>images/products/<?=$item->picName?>" alt="<?=$item->subject?>" title="<?=$item->subject?>" class="img-responsive" /></a>
                            </div>
                            <div class="caption">
                                <h4><a href="<?=http().'products?id='.$item->id?>"><?=$item->subject?></a></h4>
                                <p class="price">
                                    <span class="price-new"><?=$item->priceSell.' '.$currentSetting->currency?></span>
                                    <br><span class="price-old"><?=$item->priceSelltmp.' '.$currentSetting->currency?></span>
                                    <br><span class="saving"><?=round(($item->priceSell*100)/($item->priceSelltmp==0?1:$item->priceSelltmp)).'%'?></span>
                                </p>
                            </div>
                        </div>
                    <?php
                    }?>


                </div>
            </aside>
            <!--Left Part End -->
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h1 class="title"></h1>
                <h3 class="subtitle"></h3>
                <div class="category-list-thumb row">
                    <?php

                    foreach ($subcatList as $item)
                    {
                        ?>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"> <a href="<?=http()?>categories?id=<?=$item->id?>"><img src="<?=http()?>images/<?=($parentId>0?'category/'.$item->pic:'no_image.jpgno_image.jpg')?>" alt="<?=$item->subject?>" /></a> <a href="<?=http()?>categories?id=<?=$item->id?>"><?=$item->subject?></a> </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="product-filter">
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <div class="btn-group">
                                <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                                <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                            </div>
<!--                            <a href="compare.html" id="compare-total">محصولات مقایسه (0)</a> -->
                        </div>
<!--                        <div class="col-sm-2 text-right">-->
<!--                            <label class="control-label" for="input-sort">مرتب سازی :</label>-->
<!--                        </div>-->
<!--                        <div class="col-md-3 col-sm-2 text-right">-->
<!--                            <select id="input-sort" class="form-control col-sm-3">-->
<!--                                <option value="" selected="selected">پیشفرض</option>-->
<!--                                <option value="">نام (الف - ی)</option>-->
<!--                                <option value="">نام (ی - الف)</option>-->
<!--                                <option value="">قیمت (کم به زیاد)</option></option>-->
<!--                                <option value="">قیمت (زیاد به کم)</option>-->
<!--                                <option value="">امتیاز (بیشترین)</option>-->
<!--                                <option value="">امتیاز (کمترین)</option>-->
<!--                                <option value="">مدل (A - Z)</option>-->
<!--                                <option value="">مدل (Z - A)</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="col-sm-1 text-right">-->
<!--                            <label class="control-label" for="input-limit">نمایش :</label>-->
<!--                        </div>-->
<!--                        <div class="col-sm-2 text-right">-->
<!--                            <select id="input-limit" class="form-control">-->
<!--                                <option value="" selected="selected">20</option>-->
<!--                                <option value="">25</option>-->
<!--                                <option value="">50</option>-->
<!--                                <option value="">75</option>-->
<!--                                <option value="">100</option>-->
<!--                            </select>-->
<!--                        </div>-->
                    </div>
                </div>
                <br />
                <div class="row products-category">
                    <?php
                    if(empty($productList))
                    {
                        echo 'هیچ کالایی یافت نشد';
                    }
                    else
                        foreach ($productList as $item)
                    {
                        $percent = round(($item->priceSell*100)/($item->priceSelltmp==0?1:$item->priceSelltmp));
                        ?>
                        <div class="product-layout product-list col-xs-12">
                            <div class="product-thumb">
                                <div class="image"><a href="<?=http().'products?id='.$item->id?>">
                                    <img style="width: 150px" src="<?=http()?>images/<?=($item->picName!=''?'products/'.$item->picName:'no_image.png')?>" alt="<?=$item->subject?>" title="<?=$item->subject?>" class="img-responsive" /></a>
                                </div>
                                <div>
                                    <div class="caption">
                                        <h4><a href="<?=http().'products?id='.$item->id?>"><?=$item->subject?></a></h4>
                                        <p class="description">
                                            <?=$item->description?>
                                        </p>
                                        <p class="price">
                                            <span class="price-old"><?=$item->priceSelltmp.' '.$currentSetting->currency?></span><br>
                                            <span class="price-new"><?=$item->priceSell.' '.$currentSetting->currency?></span>
                                            <span class="saving"><?=100-($percent==0?100:$percent).'%'?></span>
                                            <span class="price-tax">بدون مالیات : <?=$item->priceSell.' '.$currentSetting->currency?></span> </p>
                                    </div>
                                    <div class="button-group">
                                        <button type="button" id="add-to-cart" data-product-id="<?=$item->id?>" class="btn btn-primary btn-lg add-to-cart">افزودن به سبد</button>
<!--                                        <div class="add-to-links">-->
<!--                                            <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>-->
<!--                                            <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>-->
<!--                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>



                </div>
                <div class="row">
                    <div class="col-sm-6 text-left">
<!--                        <ul class="pagination">-->
<!--                            <li class="active"><span>1</span></li>-->
<!--                            <li><a href="#">2</a></li>-->
<!--                            <li><a href="#">&gt;</a></li>-->
<!--                            <li><a href="#">&gt;|</a></li>-->
<!--                        </ul>-->
                    </div>
<!--                    <div class="col-sm-6 text-right">نمایش 1 تا 12 از 15 (مجموع 2 صفحه)</div>-->
                </div>
            </div>
            <!--Middle Part End -->
        </div>
    </div>
</div>