<?php
include_once("../_layout/header.php");
include_once("../_layout/menu.php");
$flag = "";// SUCCESS - ERROR - INFO - WARNING
$message = "";
if(
    isset($_POST['transportation']) && !empty($_POST['transportation']) &&
    isset($_POST['payType']) && !empty($_POST['payType'])

)
{
    $transportation = $_POST['transportation'];
    $description = $_POST['description'];
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
    $tbl_order->description = $transportation.'=>'.$description;
    $tbl_order->paymenttype = $_POST['pay'];
    $tbl_order->userid = $currentUser->id;
    $tbl_order->state = 0;

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
        $flag="SUCCESS";
        $message = 'سفارش شما با موفقیت ثبت شد - شماره سفارش : '.$orderid;

        unset($_SESSION['cart']);
    }
    else
    {
        $flag="ERROR";
        $message = "خطایی رخ داده است لطفا مجدد سعی کنید";
    }
}

?>
    <style>
        .demo-card-wide.mdl-card {
            width: 100%;
            margin-top:5px ;
        }
        .demo-card-wide > .mdl-card__title {
            color: #fff;
            height: 176px;
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
    </style>

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%">
        <thead>
        <tr>
            <td>#</td>
            <th class="mdl-data-table__cell--non-numeric">نام کالا</th>
            <th>تعداد</th>
            <th>مبلغ</th>
        </tr>
        </thead>
        <tbody>
            <?php
    $counter = 0;
    $sum = 0;
    if(isset($_SESSION["cart_item"])&&!empty($_SESSION["cart_item"]))
foreach ($_SESSION["cart_item"] as $item) {
    $counter++;
    $sum+=$item["price"];
    ?>

    <tr>
        <th class="mdl-data-table__cell--non-numeric"><?=$counter?></th>
        <td class="mdl-data-table__cell--non-numeric"><?=$item['name']?></td>
        <td><?=$item["quantity"]?></td>
        <td><?=$item["price"]?></td>
    </tr>
    <?php
}
?>
        </tbody>
    </table>


<form action="" method="post">
    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
        <div class="mdl-card__actions mdl-card--border">
            <label class="mdl-card" style="text-align: left">
                جمع فاکتور:
                <?=$sum?>
                تومان
            </label>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button" name="pay" value="1" checked>
                <span class="mdl-radio__label"> پرداخت درب منزل </span>
            </label>
            <br>    
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" name="pay" value="2">
                <span class="mdl-radio__label">پرداخت آنلاین</span>
            </label>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
                <input type="radio" id="option-4" class="mdl-radio__button" name="transportation" value="ارسال رایگان" checked>
                <span class="mdl-radio__label">ارسال معمولی</span>
            </label>
            <br>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
                <input type="radio" id="option-3" class="mdl-radio__button" name="transportation" value="ارسال سریع" >
                <span class="mdl-radio__label"> ارسال سریع (2000 تومان) </span>
            </label>

        </div>
        <div class="mdl-card__actions mdl-card--border">
            <div class="mdl-card__supporting-text">
                <div class="mdl-textfield mdl-js-textfield">
                    <input name="description" class="mdl-textfield__input" type="text" id="sample1">
                    <label class="mdl-textfield__label" for="sample1">توضیحات</label>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: fixed;bottom: 0;width: 100%">
        ثبت سفارش
    </button>
</form>

<?php
include_once("../_layout/footer.php");
?>