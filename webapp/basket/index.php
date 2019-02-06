<?php
include_once("../_layout/header.php");
include_once("../_layout/menu.php");
?>

<table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp" style="width: 100%">
    <thead>
    <tr>
        <th class="mdl-data-table__cell--non-numeric">نام کالا</th>
        <th>تعداد</th>
        <th>مبلغ</th>
        <th></th>
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
                <td class="mdl-data-table__cell--non-numeric"><?=$item['name']?></td>
                <td><?=$item["quantity"]?></td>
                <td><?=$item["price"]?></td>
                <td>
                    <a href="#" class="removeFromCart" data-product-id="<?=$item["id"]?>">
                        <i class="material-icons">remove_shopping_cart</i>
                    </a>
                </td>
            </tr>
            <?php
        }
    else
    {
        ?>
        <tr>
            <th class="" colspan="5">سبد خرید خالی است</th>
        </tr>
        <?php
    }
    if($sum>0)
    {
        ?>
        <tr>
            <th class="" colspan="5">جمع فاکتور:<?=$sum?> تومان </th>
        </tr>
        <tr>
            <th class="" colspan="5">.</th>
        </tr>
        <?php
    }
    ?>


    </tbody>
</table>
    <a href="<?=http()?>webapp/invoce/" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: fixed;bottom: 0;width: 100%">
        تکمیل سفارش
    </a>
<?php
include_once("../_layout/footer.php");
?>