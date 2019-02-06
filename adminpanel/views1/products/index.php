<?php
$productclass = new product();
if(isset($_POST['savePrice']) && !empty($_POST['savePrice']))
{
    $id = $_POST['id'];
    $priceSellTmp = $_POST['priceSelltmp'];
    $priceSell = $_POST['priceSell'];

    $productObj = $productclass->getProductObject($id);
    $productObj->priceSelltmp = $priceSellTmp;
    $productObj->priceSell = $priceSell;

    $x=$productclass->update($productObj);
}


$page = 1;
$number=50;

if(isset($_GET['page'])&&!empty($_GET['page']))
{
    $page=$_GET['page'];
}
$min=($number*$page)-$number;


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            محصولات
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>داشبورد</a></li>
            <li class="active">محصولات</li>
        </ol>
    </section>

    <?php
    if(isset($_GET['delid'])&& !empty($_GET['delid']))
    {
        $deleteid = $_GET['delid'];

        $x=$productclass->delete($deleteid);

    }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <?php

                if(isset($x))
                {
                    if($x>0)
                    {
                        echo '<div class="alert alert-success">';
                        echo 'با موفقیت بروزرسانی شد';
                    }
                    else
                    {
                        echo '<div class="alert alert-error">';
                        echo 'خطا در بروزرسانی اطلاعات';
                    }
                    echo '</div>';
                }

                ?>
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">جستجو</h3>
                    </div>
                    <form role="form" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="نام محصول">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="barcode" name="barcode" placeholder="بارکد محصول">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">جستجو</button>
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
                        <table id="tablelistview1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>عکس</th>
                                <th>نام محصول</th>
                                <th>دسته بندی</th>
                                <th>تعداد</th>
                                <th>قیمت خرید</th>
                                <th>قیمت فروش قدیم</th>
                                <th>قیمت فروش</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $proClass = new product();
                            $catClass = new category();

                            $subject='';
                            $barcode='';
                            $filter='';

                            if(isset($_POST['subject'])&&!empty($_POST['subject']))
                            {
                                $subject= " and subject LIKE '%".$_POST['subject']."%' ";
                                $filter .= $subject;
                            }
                            if(isset($_POST['barcode'])&&!empty($_POST['barcode']))
                            {
                                $barcode= " and barcode LIKE '%".$_POST['barcode']."%' ";
                                $filter .= $barcode;
                            }

                            $countProduct = 0;
                            if($filter=='')
                            {
                                $productList = $proClass->getProducts($min,$number-1);
                                $countProduct = count($productList);
                            }
                            else
                                $productList = $proClass->getProductsWithFilters($filter);

                            foreach ($productList as $item)
                            {

                                ?>
                                <tr>
                                    <td><img class="img-circle img-md" src="<?=http()?>images/products/<?=$item->picName?>"></td>
                                    <td><?=$item->subject?></td>
                                    <td><?=$catClass->getCategory($item->categoryId)->subject?></td>
                                    <td><?=$item->number?></td>
                                    <td><?=$item->priceBuy?></td>
                                    <td><?=$item->priceSelltmp?></td>
                                    <td><?=$item->priceSell?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#modal<?=$item->id?>"><i class="fa fa-dollar"></i></a>
                                        <a href="<?=http_admin()?>products/newProduct?id=<?=$item->id?>"><i class="fa fa-fw fa-eye"></i></a>
                                        <a href="?delid=<?=$item->id?>"><i class="fa fa-fw fa-remove"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>عکس</th>
                                <th>نام محصول</th>
                                <th>دسته بندی</th>
                                <th>تعداد</th>
                                <th>قیمت خرید</th>
                                <th>قیمت فروش قدیم</th>
                                <th>قیمت فروش</th>
                                <th>عملیات</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="tablelistview_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous <?=($min==0?'disabled':'')?>" id="tablelistview_previous">
                                            <a href="#" aria-controls="tablelistview">قبلی</a>
                                        </li>
                                        <li class="paginate_button active">
                                            <a href="<?=http()?>adminpanel/products/?page=1" aria-controls="tablelistview">1</a>
                                        </li>
                                        <?php

                                        ?>
                                        <li class="paginate_button ">
                                            <a href="<?=http()?>adminpanel/products/index?page=2" aria-controls="tablelistview">2</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="<?=http()?>adminpanel/products/index?page=3" aria-controls="tablelistview">3</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="<?=http()?>adminpanel/products/index?page=4" aria-controls="tablelistview">4</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="<?=http()?>adminpanel/products/index?page=5" aria-controls="tablelistview">5</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="<?=http()?>adminpanel/products/index?page=6" aria-controls="tablelistview">6</a>
                                        </li>
                                        <li class="paginate_button next" id="tablelistview_next">
                                            <a href="#" aria-controls="tablelistview" >بعدی</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
<?php
foreach ($productList as $item) {
    ?>
    <!-- modal -->
    <div class="modal fade" id="modal<?=$item->id?>">
        <div class="modal-dialog">
            <form method="post" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">قیمت گذاری</h4>
                    <input type="hidden" name="id" class="form-control" value="<?=$item->id?>"/>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3">قیمت فروش قدیم</div>
                            <div class="col-md-3">
                                <input id="priceSelltmp" name="priceSelltmp" class="form-control" value="<?=$item->priceSelltmp?>"/>
                            </div>
                            <div class="col-md-3">قیمت فروش </div>
                            <div class="col-md-3">
                                <input id="priceSell" name="priceSell" class="form-control" value="<?=$item->priceSell?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">بستن</button>
                    <button type="submit" value="submit" class="btn btn-success" name="savePrice">ذخیره</button>
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
