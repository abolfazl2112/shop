<?php
$categoryClass = new category();
$productClass = new product();

?>

<div id="container">
    <div class="container">
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-xs-12">
                <?php include 'views/_layout/slideshow.php';?>
                <!-- Feature Box Start-->
                <div class="container">
                    <div class="custom-feature-box row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="feature-box fbox_1">
                                <div class="title">ارسال رایگان</div>
                                <p>برای خرید های روزانه</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="feature-box fbox_3">
                                <div class="title">کارت هدیه</div>
                                <p>بهترین هدیه برای عزیزان شما</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="feature-box fbox_4">
                                <div class="title">امتیازات خرید</div>
                                <p>از هر خرید امتیاز کسب کرده و از آن بهره بگیرید</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Feature Box End-->
                <!-- دسته ها محصولات Slider Start-->
                <div class="category-module" id="latest_category">
                    <h3 class="subtitle">جدیدترین ها <a class="viewall" href="#"></a></h3>
                    <div class="category-module-content">
                        <ul id="sub-cat" class="tabs">
                            <?php
                            $counter = 1;
                            $categoryList = $categoryClass->getCategoryFirstPage();
                            foreach ($categoryList as $item)
                            {
                                ?>
                                <li><a href="#tab-cat<?=$counter++?>"><?=$item->subject?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                        $counter=1;
                        foreach ($categoryList as $citem)
                        {
                            ?>
                            <div id="tab-cat<?=$counter++?>" class="tab_content">
                                <div class="owl-carousel latest_category_tabs">
                                    <?php
                                    $productsInCategory = $productClass->getProductInCategoryAndSubCategory($citem->id);
                                    $counterProducts = 0;
                                    foreach ($productsInCategory as $item)
                                    {
                                        $counterProducts++;
                                        if($counterProducts>20)break;
                                        ?>
                                        <div class="product-thumb clearfix">
                                            <div class="image"><a href="<?=http()?>products?id=<?=$item->id?>">
                                                    <img src="<?=http()?>images/products/<?=$item->picName?>" alt="<?=$item->subject?>" title="<?=$item->subject?>" class="img-responsive" /></a>
                                            </div>
                                            <div class="caption">
                                                <h4><a href="<?=http()?>products?id=<?=$item->id?>"><?=$item->subject?></a></h4>
                                                <p class="price-old"><?=$item->priceSelltmp.' '.$currentSetting->currency?></p>
                                                <p class="price"><?=$item->priceSell.' '.$currentSetting->currency?></p>
                                                <div class="rating">
                                                    <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                                    </span> <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                                    </span>
                                                    <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                                    </span> <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                                    </span>
                                                    <span class="fa fa-stack">
                                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <button type="button" id="add-to-cart" data-product-id="<?=$item->id?>" class="btn btn-primary btn-lg add-to-cart">افزودن به سبد</button>
<!--                                                <button id="add-to-cart" class="btn-primary add-to-cart" type="button" onClick=""><span>افزودن به سبد</span></button>-->
<!--                                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>-->
<!--                                                <div class="add-to-links">-->
<!--                                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>-->
<!--                                                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>-->
<!--                                                </div>-->
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>


                                    <!--                                    <div class="product-thumb">-->
                                    <!--                                        <div class="image"><a href="../../0/index.php"><img src="--><?//=http()?><!--images/products/samsung_tab_1-200x200.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>-->
                                    <!--                                        <div class="caption">-->
                                    <!--                                            <h4><a href="../../0/index.php">تبلت ایسر</a></h4>-->
                                    <!--                                            <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>-->
                                    <!--                                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>-->
                                    <!--                                        </div>-->
                                    <!--                                        <div class="button-group">-->
                                    <!--                                            <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>-->
                                    <!--                                            <div class="add-to-links">-->
                                    <!--                                                <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>-->
                                    <!--                                                <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->



                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <!-- دسته ها محصولات Slider End-->
                <!-- پرفروش ها محصولات Start-->
                <h3 class="subtitle">پرفروش ها</h3>
                <div class="owl-carousel product_carousel">
                    <?php
                    $bestSellingProducts = $productClass->getBestsellingProducts();
                    foreach ($bestSellingProducts as $item)
                    {
                        ?>
                        <div class="product-thumb clearfix">
                            <div class="image">
                                <a href="<?=http().'products?id='.$item->id?>">
                                    <img src="<?=http()?>images/products/<?=$item->picName?>" alt="<?=$item->subject?>" title="<?=$item->subject?>" class="img-responsive" />
                                </a>
                            </div>
                            <div class="caption">
                                <h4><a href="<?=http()?>products?id=<?=$item->id?>"><?=$item->subject?></a></h4>
                                <span class="price-old"><?=$item->priceSelltmp.' '.$currentSetting->currency?></span>
                                <p class="price"><?=$item->priceSell.' '.$currentSetting->currency?></p>
                                <div class="rating">
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star fa-stack-2x"></i>
                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span> <span class="fa fa-stack">
                                        <i class="fa fa-star fa-stack-2x"></i>
                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span>
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star fa-stack-2x"></i>
                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span> <span class="fa fa-stack">
                                        <i class="fa fa-star fa-stack-2x"></i>
                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span>
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="button-group">
                                <button type="button" id="add-to-cart" data-product-id="<?=$item->id?>" class="btn btn-primary btn-lg add-to-cart">افزودن به سبد</button>
<!--                                <button id="add-to-cart" class="btn-primary add-to-cart" type="button" onClick=""><span>افزودن به سبد</span></button>-->
<!--                                <button id="add-to-cart" class="btn-primary add-to-cart" type="button" onClick=""><span>افزودن به سبد</span></button>-->
<!--                                <div class="add-to-links">-->
<!--                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>-->
<!--                                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>-->
<!--                                </div>-->
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                </div>
                <!-- Featured محصولات End-->
                <!-- Banner Start-->
<!--                <div class="SelenShop-banner">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="#"><img title="بنر نمونه 2" alt="بنر نمونه 2" src="--><?//=http()?><!--images/banner/sample-banner-3-360x360.jpg"></a></div>-->
<!--                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="#"><img title="بنر نمونه" alt="بنر نمونه" src="--><?//=http()?><!--images/banner/sample-banner-1-360x360.jpg"></a></div>-->
<!--                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="#"><img title="بنر نمونه 3" alt="بنر نمونه 3" src="--><?//=http()?><!--images/banner/sample-banner-2-360x360.jpg"></a></div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- Banner End-->

                <!-- Banner Start -->
<!--                <div class="SelenShop-banner">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
<!--                            <a href="#"><img title="1 Block Banner" alt="1 Block Banner" src="--><?//=http()?><!--images/banner/1blockbanner-1140x75.jpg"></a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- Banner End -->
                <!-- برند Logo Carousel Start-->
                <div id="carousel" class="owl-carousel nxt">
                    <div class="item text-center"> <a href="#"><img src="<?=http()?>images/products/apple_logo-100x100.jpg" alt="" class="img-responsive" /></a> </div>
                    <div class="item text-center"> <a href="#"><img src="<?=http()?>images/products/canon_logo-100x100.jpg" alt="" class="img-responsive" /></a> </div>
                    <div class="item text-center"> <a href="#"><img src="<?=http()?>images/products/apple_logo-100x100.jpg" alt="" class="img-responsive" /></a> </div>
                    <div class="item text-center"> <a href="#"><img src="<?=http()?>images/products/canon_logo-100x100.jpg" alt="" class="img-responsive" /></a> </div>
                    <div class="item text-center"> <a href="#"><img src="<?=http()?>images/products/apple_logo-100x100.jpg" alt="" class="img-responsive" /></a> </div>
                    <div class="item text-center"> <a href="#"><img src="<?=http()?>images/products/canon_logo-100x100.jpg" alt="" class="img-responsive" /></a> </div>
                    <div class="item text-center"> <a href="#"><img src="<?=http()?>images/products/apple_logo-100x100.jpg" alt="" class="img-responsive" /></a> </div>
                    <div class="item text-center"> <a href="#"><img src="<?=http()?>images/products/canon_logo-100x100.jpg" alt="" class="img-responsive" /></a> </div>
                </div>
                <!-- برند Logo Carousel End -->
            </div>
            <!--Middle Part End-->
        </div>
    </div>
</div>

