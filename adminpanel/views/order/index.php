<?php
$orderClass = new order();
$userClass = new user();
if(
        isset($_GET['op']) && !empty($_GET['op']) && $_GET['op']=='del' &&
        isset($_GET['id']) && !empty($_GET['id'])
)
{
    $x=$orderClass->delete($_GET['id']);
    if ($x > 0) {
        $opClass = new orderproduct();
        $x=$opClass->deleteWhitOrderId($_GET['id']);
        $_SESSION['error'] = 'success';
        $_SESSION['error_message'] = 'حذف شد';
    } else {
        $_SESSION['error'] = 'danger';
        $_SESSION['error_message'] = 'خطا : حذف نشد';
    }
//    header('location:'.http_admin().'orders/index');exit();
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            سفارشات
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>داشبورد</a></li>
            <li class="active">سفارشات</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php

                if(isset($_SESSION['error']))
                {
                    ?>
                    <label style="display: block" class="alert alert-<?=$_SESSION['error']?>"><?=$_SESSION['error_message']?></label>
                    <?php
                    unset($_SESSION['error']);
                }
                ?>
                <!-- general form elements -->
<!--                <div class="box box-success">-->
<!--                    <div class="box-header with-border">-->
<!--                        <h3 class="box-title">جستجو</h3>-->
<!--                    </div>-->
<!--                    <form role="form" method="post">-->
<!--                        <div class="box-body">-->
<!--                            <div class="form-group">-->
<!--                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="شماره سفارش">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="box-footer">-->
<!--                            <button type="submit" class="btn btn-primary">جستجو</button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
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
                                <th>شماره سفارش</th>
                                <th>مشتری</th>
                                <th>زمان</th>

                                <th>مبلغ</th>
                                <th>توضیح</th>
                                <th></th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($orderClass->getOrders() as $item)
                            {
                                $user = $userClass->getUserById($item->userid);
                                ?>
                                <tr>
                                    <td><?=$item->id?></td>
                                    <td><?=($user?$user->name.' '.$user->family:'کاربر حذف شده است')?></td>
                                    <td>
                                        <?=
                                        substr($item->date,0,4).'/'.
                                        substr($item->date,4,2).'/'.
                                        substr($item->date,6,2).
                                        '-'.
                                        substr($item->time,0,2).':'.
                                        substr($item->time,2,2).':'.
                                        substr($item->time,4,2)
                                        ?>
                                    </td>
                                    <td>
                                        <?=$item->price?>
                                    </td>
                                    <td>
                                        <?=$item->description?>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <a href="<?=http_admin().'orders/orderDetails?id='.$item->id?>"><i class="fa fa-fw fa-eye"></i></a>
                                        <a href="<?=http_admin().'orders/index?op=del&id='.$item->id?>"><i class="fa fa-fw fa-remove"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>شماره سفارش</th>
                                <th>مشتری</th>
                                <th>مبلغ</th>
                                <th>توضیح</th>
                                <th>عملیات</th>
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