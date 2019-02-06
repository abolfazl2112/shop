<?php

$userId = $_SESSION['uid'];
$order = new order();
$myorders = $order->getUserOrders($userId);
?>

<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-12">
                <h1 class="title">لیست سفارشات من</h1>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-center">شماره سفارش</td>
                            <td class="text-left">تاریخ</td>
                            <td class="text-left">مبلغ</td>
                            <td class="text-right">توضیحات</td>
<!--                            <td class="text-right"></td>-->
                            <td class="text-right">عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($myorders as $item)
                        {
                            ?>
                            <tr>
                                <td class="text-center"><?=$item->id?></td>
                                <td class="text-left"><?=
                                    substr($item->date,0,4).'/'.
                                    substr($item->date,4,2).'/'.
                                    substr($item->date,6,2).
                                    '-'.
                                    substr($item->time,0,2).':'.
                                    substr($item->time,2,2).':'.
                                    substr($item->time,4,2)
                                    ?></td>
                                <td class="text-right"><div class="price"><?=$item->price?> </div></td>
                                <td class="text-right"><?=$item->description?></td>


                                <td class="text-right">
                                    <button class="btn btn-primary" title="" type="button" data-toggle="modal" data-target="#modal<?=$item->id?>"><i data-toggle="tooltip" data-original-title="نمایش سفارش" class="fa fa-eye"></i></button>
                            </tr>
                        <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!--Middle Part End -->
        </div>
    </div>
</div>

<?php
foreach ($myorders as $item) {
    ?>
    <!-- modal -->
    <div class="modal fade" id="modal<?=$item->id?>">
        <div class="modal-dialog" style="background-color: #fff;border-radius: 5px;">
            <form method="post" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">جزییات سفارش</h4>
                    <input type="hidden" name="id" class="form-control" value="<?=$item->id?>"/>
                </div>
                <div class="modal-body">
                    <table id="tablelistview" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>نام کالا</th>
                            <th>تعداد</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $orderproductClass = new orderproduct();
                        $opList = $orderproductClass->getOrderProductObject($item->id);
                        foreach ($opList as $row)
                        {
                            ?>
                            <tr>
                                <td><?=$row->subject?></td>
                                <td><?=$row->number?></td>
                            </tr>
                            <?php
                        }
                        ?>


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>نام کالا</th>
                            <th>تعداد</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">بستن</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php
}
?>