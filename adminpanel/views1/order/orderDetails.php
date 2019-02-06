<?php
if(isset($_GET['id'])&&!empty($_GET['id']))
    $id = $_GET['id'];
else
{
    header('location:'.http_admin().'orders/index');
    exit();
}
$orderproductClass = new orderproduct();
$opList = $orderproductClass->getOrderProductObject($id);

$orderClass = new order();
$orderDetails = $orderClass->getOrderObject($id);

$userClass = new user();
$user = $userClass->getUserById($orderDetails->userid);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            جزییات سفارش
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>داشبورد</a></li>
            <li class="active">جزییات سفارش</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">جزییات</h3>
                    </div>
                    <form role="form" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label>شماره سفارش</label>
                                <label><?=$orderDetails->id?></label>
                            </div>
                            <div class="form-group">
                                <label>نام و نام خانوادگی</label>
                                <label><?=$user?$user->name.' '.$user->family:'کاربر حذف شده است'?></label>
                            </div>
                            <div class="form-group">
                                <label>توضیحات:</label>
                                <label><?=$orderDetails->description?></label>
                            </div>
                            <div class="form-group">
                                <label>تاریخ و زمان:</label>
                                <label>
                                    <?=
                                    substr($orderDetails->date,0,4).'/'.
                                    substr($orderDetails->date,4,2).'/'.
                                    substr($orderDetails->date,6,2).
                                    '-'.
                                    substr($orderDetails->time,0,2).':'.
                                    substr($orderDetails->time,2,2).':'.
                                    substr($orderDetails->time,4,2)
                                    ?></label>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tablelistview" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>نام کالا</th>
                                <th>تعداد</th>
                                <th>وزن</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($opList as $item)
                            {
                                ?>
                                <tr>
                                    <td><?=$item->subject?></td>
                                    <td><?=$item->number?></td>
                                    <td><?=$item->weight?></td>

                                </tr>
                                <?php
                            }
                            ?>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>نام کالا</th>
                                <th>سایز</th>
                                <th>وزن</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->