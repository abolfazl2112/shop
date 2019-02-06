<?php
include_once("../_layout/header.php");
include_once("../_layout/menu.php");
$userId = $_SESSION['uid'];
$orderClass = new order();
?>

    <table class="mdl-data-table mdl-js-data-table  " style="width: 100%">
        <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">#</th>
            <th class="mdl-data-table__cell--non-numeric">شماره سفارش</th>
            <th>تاریخ</th>
            <th>مبلغ</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($orderClass->getUserOrders($userId) as $item)
            {
                ?>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric">$item->orderid</td>
                    <td class="mdl-data-table__cell--non-numeric"><?=
                        substr($item->date,0,4).'/'.
                        substr($item->date,4,2).'/'.
                        substr($item->date,6,2).
                        '-'.
                        substr($item->time,0,2).':'.
                        substr($item->time,2,2).':'.
                        substr($item->time,4,2)
                        ?></td>
                    <td><?=$item->price?> </td>
                    <td><a href=""></a></td>
                </tr>
                <?php
            }
        ?>


        </tbody>
    </table>
<?php
include_once("../_layout/footer.php");
?>