<?php
$productClass=new product();
$user = new user();
$tblUser=null;
$totalFactor=0;
$userid=0;
$orderid=0;

if(
    isset($_SESSION['cart']) && !empty($_SESSION['cart']) &&
    isset($_POST['confirm_agree']) &&
    isset($_POST['account_input']) &&
    isset($_POST['description'])
)
{
    $isTrue=true;
    $account_input = $_POST['account_input'];
    $transportation = $_POST['transportation'];
    $pay = $_POST['pay'];
    $description = $_POST['description'];
    $confirm_agree = $_POST['confirm_agree'];

    if($confirm_agree!=1)
    {

        $_SESSION['error']= 'error';
        $_SESSION['error_message'] = 'شما باید قوانین را تایید نمایید';
        $isTrue=false;
    }
    else if($account_input=="register")
    {
        $tblUser=new tbl_user();
        $tblUser->password=rand(10000,99999);
        $tblUser->mobile = $_POST['mobile'];
        $tblUser->username = $_POST['mobile'];
        $tblUser->address = $_POST['address'];
        $tblUser->family = $_POST['lastname'];
        $tblUser->active = 1;
        if($user->getUserByUsername($tblUser->username))
        {
            $_SESSION['error']= 'error';
            $_SESSION['error_message'] = 'کاربر تکراری است';
            $isTrue=false;
        }

        if($user->getUserByMobile($tblUser->mobile))
        {
            $_SESSION['error']= 'error';
            $_SESSION['error_message'] = 'کاربر تکراری است';
            $isTrue=false;
        }

        $userid=$user->signUp($tblUser);
        if($isTrue&&$userid>0)
        {
            $sms = new kavenegarsms();
            $sms->sendsms(sprintf(message::$sendSmsSuccessSignUp,$tblUser->password),array($tblUser->mobile));
            $_SESSION['error']= 'success';
            $_SESSION['error_message'] = 'کاربر اضافه شد';
            $isTrue=true;
        }
        else
        {
            $_SESSION['error']= 'error';
            $_SESSION['error_message'] = 'خطا در ثبت اطلاعات';
            $isTrue=false;
        }
    }
    else if($account_input=="login")
    {
        $userid= $user->checkUserExist($_POST['username'],$_POST['password']);
        if($userid)
        {
            $tblUser = $user->getUserById($userid);
            if($tblUser->active==1)
            {
                $_SESSION['error']= 'success';
                $_SESSION['error_message'] = 'کاربر وجود دارد';
                $isTrue=true;
            }
            else
            {
                $_SESSION['error']= 'error';
                $_SESSION['error_message'] = 'حساب کاربری شما تایید نشده است';
                $isTrue=false;
            }
        }
        else
        {
            $_SESSION['error']= 'error';
            $_SESSION['error_message'] = 'نام کاربری یا رمز عبور اشتباه است';
            $isTrue=false;
        }


    }
    if($isTrue)
    {
        $totalFactor=0;
        foreach($_SESSION['cart'] as $row)
        {
            $item = $productClass->getProductObject($row['pid']);
            $totalFactor += ($item->priceSell * $row['qty']);
        }
        $tbl_order = new tbl_order();
        $tbl_order->date=jdate('omd','','','','en');
        $tbl_order->time=jdate('His','','','','en');
        $tbl_order->ressellerid = '0';
        $tbl_order->price=$totalFactor;
        $tbl_order->discountcode = '';
        $tbl_order->description = $_POST['description'];
        $tbl_order->paymenttype = $_POST['pay'];
        $tbl_order->userid = $userid;

        $orderClass = new order();
        $x=$orderClass->insert($tbl_order);
        if($x>0)
        {
            $orderid=$x;
            foreach ($_SESSION['cart'] as $row)
            {
                $product = $productClass->getProductObject($row['pid']);
                $total=($item->priceSell*$row['qty']);

                $tblOrderProduct = new tbl_orderproduct();
                $tblOrderProduct->number=$row['qty'];
                $tblOrderProduct->priceBuy=$product->priceBuy;
                $tblOrderProduct->priceSell=$product->priceSell;
                $tblOrderProduct->priceSelltmp=$product->priceSelltmp;
                $tblOrderProduct->productid=$product->id;
                $tblOrderProduct->subject=$product->subject;
                $tblOrderProduct->total=$total;
                $tblOrderProduct->picName=$product->picName;
                $tblOrderProduct->orderid=$x;

                $opClass = new orderproduct();
                $opClass->insert($tblOrderProduct);

            }
            $_SESSION['error']= 'success';
            $_SESSION['error_message'] = 'سفارش شما با موفقیت ثبت شد - شماره سفارش : '.$orderid;

            unset($_SESSION['cart']);
        }
        else
        {
            $_SESSION['error']= 'error';
            $_SESSION['error_message'] = 'خطا در ثبت اطلاعات';
            $isTrue=false;
        }

    }
    else
    {
        $_SESSION['error']= 'error';
        $_SESSION['error_message'] = 'سفارش ثبت نشد';
        $isTrue=false;
    }
//    echo $account_input.'<br>';
//    echo $transportation.'<br>';
//    echo $pay.'<br>';
//    echo $confirm_agree.'<br>';
//    exit();
}
?>

<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="<?=http()?>"><i class="fa fa-home"></i></a></li>
            <li><a href="cart.html">سبد خرید</a></li>
            <li><a href="checkout.html">تسویه حساب</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <?php
                if(isset($_SESSION['error']))
                {
                    ?>
                    <label class="alert alert-<?=$_SESSION['error']?> " style="display: block;"><?=$_SESSION['error_message']?></label>
                    <?php
                    unset($_SESSION['error']);
                    unset($_SESSION['error_message']);
                }
                ?>
                <h1 class="title">تسویه حساب</h1>
                <form action="" method="post" class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-sign-in"></i> یک حساب کاربری ساخته و یا به حساب خود وارد شوید</h4>
                            </div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="register" name="account_input">
                                        ثبت نام حساب کاربری</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="login" name="account_input">
                                        مشتری قبلی</label>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-user"></i>اطلاعات کاربری شما</h4>
                            </div>
                            <div id="panel-register" class="panel-body panel-register">
                                <fieldset id="account">
                                    <div class="form-group required">
                                        <label for="input-payment-firstname" class="control-label">نام</label>
                                        <input type="text" class="form-control" id="input-firstname" placeholder="نام" value="" name="firstname">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-lastname" class="control-label">نام خانوادگی</label>
                                        <input type="text" class="form-control" id="input-lastname" placeholder="نام خانوادگی" value="" name="lastname">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-telephone" class="control-label">موبایل</label>
                                        <input type="text" class="form-control" id="mobile" placeholder="شماره تلفن"  value="" name="mobile">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-payment-email" class="control-label"> آدرس</label>
                                        <textarea class="form-control"   name="address" ></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="panel-login" class="panel-body panel-login" style="display: none">
                                <fieldset id="account">
                                    <div class="form-group required">
                                        <label for="input-payment-firstname" class="control-label">نام کاربری</label>
                                        <input type="text" class="form-control" id="input-username"  placeholder="نام کابری" value="" name="username">
                                    </div>
                                    <div class="form-group required">
                                        <label for="" class="control-label">رمز عبور</label>
                                        <input type="password" class="form-control" id="input-password"  placeholder="رمز عبور" value="" name="password">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-truck"></i> شیوه ی تحویل</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" checked="checked" name="transportation" value="free">
                                                رایگان - 0 تومان (در زمان مشخص)</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="transportation" value="express">
                                                ارسال سریع - 2000 تومان</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-credit-card"></i> شیوه پرداخت</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" checked="checked" name="pay" value="offline">
                                                پرداخت درب منزل</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pay" value="online">
                                                پرداخت آنلاین</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="display: none;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-ticket"></i> استفاده از کوپن تخفیف</h4>
                                    </div>
                                    <div class="panel-body">
                                        <label for="input-coupon" class="col-sm-3 control-label">کد تخفیف خود را وارد کنید</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="input-coupon" placeholder="کد تخفیف خود را در اینجا وارد کنید" value="" name="coupon">
                                            <span class="input-group-btn">
                                                <input type="button" class="btn btn-primary" data-loading-text="بارگذاری ..." id="button-coupon" value="اعمال کوپن">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="display: none;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-gift"></i> استفاده از کارت هدیه</h4>
                                    </div>
                                    <div class="panel-body">
                                        <label for="input-voucher" class="col-sm-3 control-label">کد کارت هدیه خود را وارد کنید</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="input-voucher" placeholder="کد کارت هدیه خود را در اینجا وارد کنید ..." value="" name="voucher">
                                            <span class="input-group-btn">
                                                <input type="submit" class="btn btn-primary" data-loading-text="بارگذاری ..." id="button-voucher" value="اعمال کارت هدیه">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i>  فاکتور</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <td class="text-center">تصویر</td>
                                                    <td class="text-left">نام محصول</td>
                                                    <td class="text-left">تعداد</td>
                                                    <td class="text-right">قیمت واحد</td>
                                                    <td class="text-right">کل</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                //                        unset($_SESSION['cart']);
                                                if(isset($_SESSION['cart']))
                                                {

                                                    foreach($_SESSION['cart'] as $row)
                                                    {
                                                        $item = $productClass->getProductObject($row['pid']);
                                                        $totalFactor+=($item->priceSell*$row['qty']);
                                                        ?>
                                                        <tr>

                                                            <td class="text-center">
                                                                <a href="#">
                                                                    <img style="height: 100px" src="<?=http()?>images/products/<?=$item->picName?>" alt="<?=$item->subject?>" title="<?=$item->subject?>" class="img-thumbnail" />
                                                                </a>
                                                            </td>
                                                            <td class="text-left">
                                                                <a href="#"><?=$item->subject?></a>
                                                                <br />
                                                                <!--                                <small>امتیازات خرید: 1000</small>-->
                                                            </td>
                                                            <td class="text-left " style="width: 94px">
                                                                <!--                                <div class="input-group btn-block quantity">-->
                                                                <!--                                    <input type="text" name="quantity" value="1" size="1" class="form-control" />-->
                                                                <!--                                    <span class="input-group-btn">-->
                                                                <!--                                        <button type="submit" data-toggle="tooltip" title="بروزرسانی" class="btn btn-primary"><i class="fa fa-refresh"></i></button>-->
                                                                <!--                                        <button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>-->
                                                                <!--                                    </span>-->
                                                                <!--                                </div>-->
                                                                <div class="qty" style="width: 64px">
                                                                    <?=$row['qty']?>
                                                                    <!--                                                                    <a data-id="--><?//=$row['proID']?><!--" data-qty="1" class="qtyBtn plus" href="javascript:void(0);">+</a>-->
                                                                    <br>
                                                                    <!--                                                                    <a data-id="--><?//=$row['proID']?><!--" data-qty="-1" class="qtyBtn mines" href="javascript:void(0);" style="top: -3.5px;">-</a>-->
                                                                    <!--                                                                    <div class="clear"></div>-->
                                                                </div>
                                                            </td>
                                                            <td class="text-right"><?=$item->priceSell.' '.$currentSetting->currency?></td>
                                                            <td class="text-right"><?=$item->priceSell*$row['qty'].' '.$currentSetting->currency?></td>
                                                            <td class="text-center">
                                                                <a href="#">
                                                                    <i data-id="<?=$row['proID']?>" class="fa fa-remove removeproduct" style="color:red"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>


                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>

                                                    <?php
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="panel-footer" style="height: 40px">
                                        <h4 class="panel-title">
                                            <div class="pull-right">
                                                <i class="fa fa-calculator"></i>جمع فاکتور
                                            </div>
                                            <div class="pull-left"><?=$totalFactor.' '.$currentSetting->currency?></div>

                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-pencil"></i> افزودن توضیح برای سفارش.</h4>
                                    </div>
                                    <div class="panel-body">
                                        <textarea rows="4" class="form-control" id="description" name="description"></textarea>
                                        <br>
                                        <label class="control-label" for="confirm_agree">
                                            <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm_agree">
                                            <span><a class="agree" href="#"><b>شرایط و قوانین</b></a> را خوانده ام و با آنها موافق هستم.</span> </label>
                                        <div class="buttons">
                                            <div class="pull-right">
                                                <input type="submit" class="btn btn-primary" id="button-confirm" value="تایید سفارش">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End -->
        </div>
    </div>
</div>
