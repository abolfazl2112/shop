

<!--Footer Start-->
<footer id="footer">
    <div class="fpart-first">
        <div class="container">
            <div class="row">
                <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <h3>اطلاعات تماس</h3>
                    <ul>
                        <li class="mobile"><i class="fa fa-mobile"></i><?=$currentSetting->mobile?></li>
                        <li class="mobile"><i class="fa fa-phone"></i><?=$currentSetting->tell?></li>
                        <li class="address"><i class="fa fa-map-marker"></i><?=$currentSetting->address?></li>

                    </ul>
                </div>
                <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <h3>اطلاعات</h3>
                    <ul>
                        <li><a href="#">حریم خصوصی</a></li>
                        <li><a href="#">شرایط و قوانین</a></li>
                    </ul>
                </div>
                <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <h3>خدمات مشتریان</h3>
                    <ul>
                        <li><a href="#">تماس با ما</a></li>
                        <li><a href="#">نقشه سایت</a></li>
                    </ul>
                </div>
                <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <h3>امکانات جانبی</h3>
                    <ul>
                        <li><a href="#">برند ها</a></li>
                        <li><a href="#">کارت هدیه</a></li>
                    </ul>
                </div>
                <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <h3>حساب من</h3>
                    <ul>
                        <li><a href="<?=http()?>home/login">حساب کاربری</a></li>
                        <li><a href="<?=http()?>home/login">تاریخچه سفارشات</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="fpart-second">
        <div class="container">
            <div id="powered" class="clearfix">
                <div class="powered_text pull-left flip">
                    <p>کپی رایت © 1396 | پشتیبانی توسط <a href="https://novintandis.ir" target="_blank">شرکت نوین تندیس</a></p>
                </div>
                <div class="social pull-right flip">
                    <a href="<?=http()?>selenshop.apk" target="_blank"> <img data-toggle="tooltip" src="<?=http()?>images/socialicons/android.png" alt="selenshop" title="دانلود مستقیم نسخه موبایل"></a>
                    <a href="https://t.me/selenshop" target="_blank"> <img data-toggle="tooltip" src="<?=http()?>images/socialicons/telegram.png" alt="telegram" title="تلگرام"></a>
                    <a href="https://www.instagram.com/selenshop2018" target="_blank"> <img data-toggle="tooltip" src="<?=http()?>images/socialicons/instagram.png" alt="instagram" title="اینستاگرام"></a>
<!--                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="--><?//=http()?><!--images/socialicons/facebook.png" alt="Facebook" title="Facebook"></a>-->
<!--                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="--><?//=http()?><!--images/socialicons/twitter.png" alt="Twitter" title="Twitter"> </a>-->
<!--                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="--><?//=http()?><!--images/socialicons/google_plus.png" alt="Google+" title="Google+"> </a>-->
<!--                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="--><?//=http()?><!--images/socialicons/pinterest.png" alt="Pinterest" title="Pinterest"> </a>-->
<!--                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="--><?//=http()?><!--images/socialicons/rss.png" alt="RSS" title="RSS"> </a>-->
                </div>
            </div>
            <div class="bottom-row"  style="display: none">
                <div class="custom-text text-center"> <img alt="" src="<?=http()?>images/logo-small.png">
                    <p>طراحی و پشتیبانی توسط شرکت نوین تندیس</p>
                </div>
                <div class="payments_types">
                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="<?=http()?>images/payment/payment_paypal.png" alt="paypal" title="PayPal"></a>
                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="<?=http()?>images/payment/payment_paypal.png" alt="paypal" title="PayPal"></a>
                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="<?=http()?>images/payment/payment_american.png" alt="american-express" title="American Express"></a>
                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="<?=http()?>images/payment/payment_2checkout.png" alt="2checkout" title="2checkout"></a>
                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="<?=http()?>images/payment/payment_maestro.png" alt="maestro" title="Maestro"></a>
                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="<?=http()?>images/payment/payment_discover.png" alt="discover" title="Discover"></a>
                    <a href="#" target="_blank"> <img data-toggle="tooltip" src="<?=http()?>images/payment/payment_mastercard.png" alt="mastercard" title="MasterCard"></a>
                </div>
            </div>
        </div>
    </div>
    <div id="back-top"><a data-toggle="tooltip" title="بازگشت به بالا" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
</footer>
<!--Footer End-->
<!-- Facebook Side Block Start -->
<div id="facebook" class="fb-left sort-order-1" style="display: none">
    <div class="facebook_icon"><i class="fa fa-facebook"></i></div>
    <div class="fb-page" data-href="#" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false">
        <div class="fb-xfbml-parse-ignore">
            <blockquote cite="#"><a href="#">نوین تندیس</a></blockquote>
        </div>
    </div>
    <div id="fb-root"></div>
<!--    <script>(function(d, s, id) {-->
<!--            var js, fjs = d.getElementsByTagName(s)[0];-->
<!--            if (d.getElementById(id)) return;-->
<!--            js = d.createElement(s); js.id = id;-->
<!--            js.src = "#";-->
<!--            fjs.parentNode.insertBefore(js, fjs);-->
<!--        }(document, 'script', 'facebook-jssdk'));</script>-->
</div>
<!-- Facebook Side Block End -->
<!-- Twitter Side Block Start -->
<div id="twitter_footer" class="twit-left sort-order-2" style="display: none">
    <div class="twitter_icon"><i class="fa fa-twitter"></i></div>
    <a class="twitter-timeline" href="#" data-chrome="nofooter noscrollbar transparent" data-theme="light" data-tweet-limit="2" data-related="twitterapi,twitter" data-aria-polite="assertive" data-widget-id="347621595801608192">توییت های @</a>

</div>
<!-- Twitter Side Block End -->
<!-- Video Side Block Start -->
<div id="video_box" class="vb-right sort-order-1" style="display: none">
    <div id="video_box_icon"><i class="fa fa-play"></i></div>
    <p>
        <iframe allowfullscreen="" src="#" height="315" width="560"></iframe>
    </p>
</div>
<!-- Video Side Block End -->
<!-- Custom Side Block Start -->
<div id="custom_side_block" class="custom_side_block_right sort-order-2" style="display: none">
    <div class="custom_side_block_icon"> <i class="fa fa-chevron-right"></i> </div>
    <table>
        <tbody>
        <tr>
            <td><h2>بلاک های محتوا</h2></td>
        </tr>
        <tr>
            <td><img alt="" src="<?=http()?>template//image/banner/cms-block.jpg"></td>
        </tr>
        <tr>
            <td>پشتیبانی توسط شرکت نوین تندیس.</td>
        </tr>
        <tr>
            <td><strong><a href="#">ادامه مطلب</a></strong></td>
        </tr>
        </tbody>
    </table>
</div>
<!-- Custom Side Block End -->
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="<?=http()?>template/selenshop/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?=http()?>template/selenshop/js/script.js"></script>
<script type="text/javascript" src="<?=http()?>template/selenshop/js/bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript" src="<?=http()?>template/selenshop/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="<?=http()?>template/selenshop/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="<?=http()?>template/selenshop/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?=http()?>template/selenshop/js/custom.js"></script>

