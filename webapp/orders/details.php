<?php
include_once("../_layout/header.php");
include_once("../_layout/menu.php");

if(isset($_GET['oid'])&&!empty($_GET['oid']))
{
    $oid = $_GET['oid'];
}
else
{
    header('location:'.http().'webapp/orders');
    exit();
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
            <input type="radio" id="option-1" class="mdl-radio__button" name="payType" value="1" checked>
            <span class="mdl-radio__label"> پرداخت درب منزل </span>
        </label>
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
            <input type="radio" id="option-2" class="mdl-radio__button" name="payType" value="2">
            <span class="mdl-radio__label">پرداخت آنلاین</span>
        </label>
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
            <input type="radio" id="option-3" class="mdl-radio__button" name="transport" value="3" checked>
            <span class="mdl-radio__label"> ارسال سریع (2000 تومان) </span>
        </label>
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
            <input type="radio" id="option-4" class="mdl-radio__button" name="transport" value="4">
            <span class="mdl-radio__label">ارسال معمولی</span>
        </label>
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <div class="mdl-card__supporting-text">
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="sample1">
                <label class="mdl-textfield__label" for="sample1">توضیحات</label>
            </div>
        </div>
    </div>
</div>
<?php
include_once("../_layout/footer.php");
?>
