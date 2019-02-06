<?php
$productClass = new product();


if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
    $product = $productClass->getProductObject($id);
}
?>

<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li itemscope itemtype="#"><a href="<?=http()?>" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
            <li itemscope itemtype="#"><a href="<?=http().'categories'?>" itemprop="url"><span itemprop="title">دسته بندی ها</span></a></li>
            <li itemscope itemtype="#"><a href="<?=http().'products?id='.$product->id?>" itemprop="url"><span itemprop="title"><?=$product->subject?></span></a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <div itemscope itemtype="">
                    <h1 class="title" itemprop="name"><?=$product->subject?></h1>
                    <div class="row product-info">
                        <div class="col-sm-5">
                            <div class="image">
                                <img class="img-responsive" itemprop="image" id="zoom_01" src="<?=http().'images/products/'.$product->picName?>" title="<?=$product->subject?>" alt="<?=$product->subject?>" data-zoom-image="<?=http().'images/products/'.$product->picName?>" />
                            </div>
                            <div class="center-block text-center">
                                <span class="zoom-gallery">
                                    <i class="fa fa-search"></i> برای مشاهده روی تصویر کلیک کنید
                                </span>
                            </div>
                            <div class="image-additional" id="gallery_01">
                                <a class="thumbnail" href="" data-zoom-image="<?=http().'images/products/'.$product->picName?>" data-image="<?=http().'images/products/'.$product->picName?>" title="<?=$product->subject?>">
                                    <img src="<?=http().'images/products/'.$product->picName?>" title="<?=$product->subject?>" alt = "<?=$product->subject?>"/>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <ul class="list-unstyled description">
                                <li><b>کد محصول :</b> <span itemprop="mpn"><?=$product->id?></span></li>
                                <li><b>نام کالا :</b> <a href="#"><span itemprop="brand"><?=$product->subject?></span></a></li>
<!--                                <li><b>امتیازات خرید:</b> 700</li>-->
                                <li><b>وضعیت موجودی :</b> <span class="instock">موجود</span></li>
                            </ul>
                            <ul class="price-box">
                                <li class="price" itemprop="offers" itemscope itemtype="">
                                    <span class="price-old"><?=$product->priceSelltmp.' '.$currentSetting->currency?></span><br><br>
                                    <span itemprop="price"><?=$product->priceSell.' '.$currentSetting->currency?>
                                        <span itemprop="availability" content="موجود"></span>
                                    </span>
                                </li>
                                <li></li>
                                <li>بدون احتساب مالیات بر ارزش افزوده</li>
                            </ul>
                            <div id="product">
                                <h3 class="subtitle"></h3>
<!--                                <div class="form-group required">-->
<!--                                    <label class="control-label">رنگ</label>-->
<!--                                    <select class="form-control" id="input-option200" name="option[200]">-->
<!--                                        <option value=""> --- لطفا انتخاب کنید --- </option>-->
<!--                                        <option value="4">مشکی </option>-->
<!--                                        <option value="3">نقره ای </option>-->
<!--                                        <option value="1">سبز </option>-->
<!--                                        <option value="2">آبی </option>-->
<!--                                    </select>-->
<!--                                </div>-->
                                <div class="cart">
                                    <div>
                                        <div class="qty" style="display: none">
                                            <label class="control-label" for="input-quantity">تعداد</label>
                                            <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                                            <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                                            <a class="qtyBtn mines" href="javascript:void(0);"  style="top: -2px;">-</a>
                                            <div class="clear"></div>
                                        </div>
                                        <button type="button" id="add-to-cart" data-product-id="<?=$product->id?>"  class="btn btn-primary btn-lg add-to-cart">افزودن به سبد</button>
                                    </div>
<!--                                    <div>-->
<!--                                        <button type="button" class="wishlist" onClick=""><i class="fa fa-heart"></i> افزودن به علاقه مندی ها</button>-->
<!--                                        <br />-->
<!--                                        <button type="button" class="wishlist" onClick=""><i class="fa fa-exchange"></i> مقایسه این محصول</button>-->
<!--                                    </div>-->
                                </div>
                            </div>
                            <div class="rating" itemprop="aggregateRating" itemscope itemtype="">
                                <meta itemprop="ratingValue" content="0" />
                                <p><span class="fa fa-stack">
                                        <i class="fa fa-star fa-stack-1x"></i>
                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                    </span>
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star fa-stack-1x"></i>
                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                    </span>
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star fa-stack-1x"></i>
                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                    </span>
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star fa-stack-1x"></i>
                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                    </span>
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                    </span>
<!--                                    <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">-->
<!--                                        <span itemprop="reviewCount">1 بررسی</span>-->
<!--                                    </a> /-->
<!--                                    <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">یک بررسی بنویسید</a></p>-->
                            </div>
                            <hr>
                            <!-- AddThis Button BEGIN -->
<!--                            <div class="addthis_toolbox addthis_default_style">-->
<!--                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>-->
<!--                                <a class="addthis_button_tweet"></a>-->
<!--                                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>-->
<!--                                <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a>-->
<!--                                <a class="addthis_counter addthis_pill_style"></a>-->
<!--                            </div>-->
<!--                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>-->
                            <!-- AddThis Button END -->
                        </div>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
<!--                        <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>-->
<!--                        <li><a href="#tab-review" data-toggle="tab">بررسی (2)</a></li>-->
                    </ul>
                    <div class="tab-content">
                        <div itemprop="description" id="tab-description" class="tab-pane active">
                            <div>
                                <p><?=$product->description?></p>
                            </div>
                        </div>
<!--                        <div id="tab-specification" class="tab-pane">-->
<!--                            <div id="tab-specification" class="tab-pane">-->
<!--                                <table class="table table-bordered">-->
<!--                                    <thead>-->
<!--                                    <tr>-->
<!--                                        <td colspan="2"><strong>حافظه</strong></td>-->
<!--                                    </tr>-->
<!--                                    </thead>-->
<!--                                    <tbody>-->
<!--                                    <tr>-->
<!--                                        <td>تست 1</td>-->
<!--                                        <td>8gb</td>-->
<!--                                    </tr>-->
<!--                                    </tbody>-->
<!--                                </table>-->
<!--                                <table class="table table-bordered">-->
<!--                                    <thead>-->
<!--                                    <tr>-->
<!--                                        <td colspan="2"><strong>پردازشگر</strong></td>-->
<!--                                    </tr>-->
<!--                                    </thead>-->
<!--                                    <tbody>-->
<!--                                    <tr>-->
<!--                                        <td>تعداد هسته</td>-->
<!--                                        <td>1</td>-->
<!--                                    </tr>-->
<!--                                    </tbody>-->
<!--                                </table>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div id="tab-review" class="tab-pane">-->
<!--                            <form class="form-horizontal">-->
<!--                                <div id="review">-->
<!--                                    <div>-->
<!--                                        <table class="table table-striped table-bordered">-->
<!--                                            <tbody>-->
<!--                                            <tr>-->
<!--                                                <td style="width: 50%;"><strong><span>هاروی</span></strong></td>-->
<!--                                                <td class="text-right"><span>1395/1/20</span></td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>-->
<!--                                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div></td>-->
<!--                                            </tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                        <table class="table table-striped table-bordered">-->
<!--                                            <tbody>-->
<!--                                            <tr>-->
<!--                                                <td style="width: 50%;"><strong><span>اندرسون</span></strong></td>-->
<!--                                                <td class="text-right"><span>1395/1/20</span></td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>-->
<!--                                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div></td>-->
<!--                                            </tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                    </div>-->
<!--                                    <div class="text-right"></div>-->
<!--                                </div>-->
<!--                                <h2>یک بررسی بنویسید</h2>-->
<!--                                <div class="form-group required">-->
<!--                                    <div class="col-sm-12">-->
<!--                                        <label for="input-name" class="control-label">نام شما</label>-->
<!--                                        <input type="text" class="form-control" id="input-name" value="" name="name">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group required">-->
<!--                                    <div class="col-sm-12">-->
<!--                                        <label for="input-review" class="control-label">بررسی شما</label>-->
<!--                                        <textarea class="form-control" id="input-review" rows="5" name="text"></textarea>-->
<!--                                        <div class="help-block"><span class="text-danger">توجه :</span> HTML بازگردانی نخواهد شد!</div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group required">-->
<!--                                    <div class="col-sm-12">-->
<!--                                        <label class="control-label">رتبه</label>-->
<!--                                        &nbsp;&nbsp;&nbsp; بد&nbsp;-->
<!--                                        <input type="radio" value="1" name="rating">-->
<!--                                        &nbsp;-->
<!--                                        <input type="radio" value="2" name="rating">-->
<!--                                        &nbsp;-->
<!--                                        <input type="radio" value="3" name="rating">-->
<!--                                        &nbsp;-->
<!--                                        <input type="radio" value="4" name="rating">-->
<!--                                        &nbsp;-->
<!--                                        <input type="radio" value="5" name="rating">-->
<!--                                        &nbsp;خوب</div>-->
<!--                                </div>-->
<!--                                <div class="buttons">-->
<!--                                    <div class="pull-right">-->
<!--                                        <button class="btn btn-primary" id="button-review" type="button">ادامه</button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
                    </div>
                    <h3 class="subtitle">محصولات مرتبط</h3>
                    <div class="owl-carousel related_pro">
                        <?php
                        $pruductList = $productClass->getBestsellingProducts(10);
                        foreach ($pruductList as $item)
                        {
                            $percent = round(($item->priceSell*100)/($item->priceSelltmp==0?1:$item->priceSelltmp));
                            ?>
                            <div class="product-thumb">
                                <div class="image"><a href="product.html"><img src="<?=http()?>images/products/<?=$item->picName?>" alt="<?=$item->subject?>" title="<?=$item->subject?>" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="product.html"><?=$item->subject?></a></h4>
                                    <p class="price">
                                        <span class="price-new"><?=$item->priceSell.' '.$currentSetting->currency?></span>
                                        <span class="price-old"><?=$item->priceSelltmp.' '.$currentSetting->currency?></span>
                                        <span class="saving"><?=100-($percent==0?100:$percent).'%'?></span>
                                    </p>
                                    <div class="rating">
                                        <span class="fa fa-stack">
                                            <i class="fa fa-star fa-stack-2x"></i>
                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                        </span>
                                        <span class="fa fa-stack">
                                            <i class="fa fa-star fa-stack-2x"></i>
                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                        </span>
                                        <span class="fa fa-stack">
                                            <i class="fa fa-star fa-stack-2x"></i>
                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                        </span> <span class="fa fa-stack">
                                            <i class="fa fa-star fa-stack-2x"></i>
                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                        </span> <span class="fa fa-stack">
                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <button id="add-to-cart" class="btn-primary add-to-cart" type="button" onClick=""><span>افزودن به سبد</span></button>
                                    <!--                                <div class="add-to-links">-->
                                    <!--                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>-->
                                    <!--                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>-->
                                    <!--                                </div>-->
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>
            <!--Middle Part End -->

        </div>
    </div>
</div>
