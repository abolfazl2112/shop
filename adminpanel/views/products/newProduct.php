
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>داشبورد</a></li>
            <li class="active"><?php if(isset($productEdit))echo 'ویرایش محصول'; else echo 'محصول جدید'?></li>
        </ol>
    </section>

    <?php
    $productClass = new product();
    $expensions= array("jpg","png","jpeg","gif");
    $id=0;
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $id=$_GET['id'];
        $productEdit=$productClass->getProductObject($id);
    }

    if(isset($_POST['subject']) && !empty($_POST['subject']))
    {
        if ($id > 0)
            $tblproduct = $productClass->getProductObject($id);
        else
            $tblproduct = new tbl_product();

        $_SESSION['error_message'] = '';
        $filename = '';
        if (isset($_FILES['pic']['name']) && !empty($_FILES['pic']['name'])) {
            $filename = explode('.', $_FILES['pic']['name']);
            $file_ext = strtolower(end($filename));

            if (in_array($file_ext, $expensions) === false) {
                $_SESSION['error_message'] .= '(پسوند فایل نا معتبر است.)';
            }

            $file_name = time() . '.' . $file_ext;


            $patch = get_path() . "/images/products/" . $file_name;
            if (move_uploaded_file($_FILES['pic']['tmp_name'], $patch)) {
                $tblproduct->picName = $file_name;
                $_SESSION['error_message'] .= '';
            } else {
                $_SESSION['error_message'] .= '(فایل بارگزاری نشد)';
            }
        }

        $tblproduct->categoryId = (isset($_POST['cid'.$_POST['cpid']]) && !empty($_POST['cid'.$_POST['cpid']])) ? $_POST['cid'.$_POST['cpid']] : '';
        $tblproduct->ressellerId = $adminID;
        $tblproduct->userId = $adminID;
        $tblproduct->subject = (isset($_POST['subject']) && !empty($_POST['subject'])) ? $_POST['subject'] : ' ';
        $tblproduct->description = (isset($_POST['description']) && !empty($_POST['description'])) ? $_POST['description'] : ' ';
        $tblproduct->keywords = (isset($_POST['keywords']) && !empty($_POST['keywords'])) ? $_POST['keywords'] : ' ';
        $tblproduct->meta = (isset($_POST['meta']) && !empty($_POST['meta'])) ? $_POST['meta'] : ' ';
//        $tblproduct->picName = (isset($_POST['pic']) && !empty($_POST['pic'])) ? $_POST['pic'] : '0';
        $tblproduct->priceBuy = (isset($_POST['priceBuy']) && !empty($_POST['priceBuy'])) ? $_POST['priceBuy'] : '0';
        $tblproduct->priceSell = (isset($_POST['priceSell']) && !empty($_POST['priceSell'])) ? $_POST['priceSell'] : '0';
        $tblproduct->priceSelltmp = (isset($_POST['priceSelltmp']) && !empty($_POST['priceSelltmp'])) ? $_POST['priceSelltmp'] : '0';
        $tblproduct->number = (isset($_POST['number']) && !empty($_POST['number'])) ? $_POST['number'] : '0';
        $tblproduct->weight = (isset($_POST['weight']) && !empty($_POST['weight'])) ? $_POST['weight'] : '0';
        $tblproduct->size = (isset($_POST['size']) && !empty($_POST['size'])) ? $_POST['size'] : ' ';
        $tblproduct->type = (isset($_POST['type']) && !empty($_POST['type'])) ? $_POST['type'] : ' ';
        $tblproduct->active = (isset($_POST['active']) && !empty($_POST['active'])) ? $_POST['active'] : '1';

        if ($id > 0)
        {

            $x = $productClass->update($tblproduct);
        }

        else
            $x = $productClass->insert($tblproduct);

        if ($x > 0) {
            $_SESSION['error'] = 'success';
            $_SESSION['error_message'] .= 'اطلاعات با موفقیت ذخیره شد';
        } else {
            $_SESSION['error'] = 'danger';
            $_SESSION['error_message'] .= 'خطا در ثبت اطلاعات(شما حداقل باید یک فیلد را تغییر دهید)';
        }

    }

    if($id>0)
    {
        $productEdit=$productClass->getProductObject($id);
    }
    ?>
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
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php if(isset($productEdit))echo 'ویرایش محصول'; else echo 'محصول جدید'?></h3>
                    </div>
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <input name="barcode" value="<?=(isset($productEdit)&&!empty($productEdit)?$productEdit->barcode:'')?>" type="text" class="form-control"  placeholder="بارکد کالا">
                            </div>
                            <div class="form-group">
                                <input name="subject" value="<?=(isset($productEdit)&&!empty($productEdit)?$productEdit->subject:'')?>" type="text" class="form-control"  placeholder="نام">
                            </div>
                            <div class="form-group">
                                    <input name="description" type="text" value="<?=(isset($productEdit)&&!empty($productEdit)?$productEdit->description:'')?>" class="form-control"  placeholder="توضیحات">
                            </div>
                            <div class="form-group" >
                                <input name="priceBuy" type="text" value="<?=(isset($productEdit)&&!empty($productEdit)?$productEdit->priceBuy:'')?>" class="form-control"  placeholder="قیمت خرید">
                            </div>
                            <div class="form-group" >
                            <input name="priceSelltmp" value="<?=(isset($productEdit)&&!empty($productEdit)?$productEdit->priceSelltmp:'')?>" type="text" class="form-control"  placeholder="قیمت فروش قدیم">
                            </div>
                            <div class="form-group">
                                <input name="priceSell" value="<?=(isset($productEdit)&&!empty($productEdit)?$productEdit->priceSell:'')?>" type="text" class="form-control" placeholder="قیمت فروش">
                            </div>
                            <div class="form-group"  >
                                <input name="number" value="<?=(isset($productEdit)&&!empty($productEdit)?$productEdit->number:'')?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="تعداد">
                            </div>

                            <div class="form-group">
                                <select id="cpid" name="cpid" onchange="selectedItem();" class="form-control">
                                    <?php
                                    $categoryclass = new category();
                                    $results = $categoryclass->getSubCategories(0);
                                    $selectedParentCategory = 0;
                                    foreach ($results as $cat)
                                    {
                                        $selected="";
                                        foreach ($categoryclass->getSubCategories($cat->id) as $item)
                                        {
                                            if(isset($productEdit)&&!empty($productEdit)&&($item->id==$productEdit->categoryId))
                                            {
                                                $selected="selected='selected'";
                                                $selectedParentCategory=$cat->id;
                                            }

                                            else
                                                $selected="";
                                        }
                                        echo "<option ".$selected." value=$cat->id>";
                                        echo "$cat->subject";
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <?php
                                $count = 0;
                                foreach ($results as $item)
                                {
                                    ?>
                                    <select id="cid<?=$item->id?>" name="cid<?=$item->id?>" class="form-control subCategory" style="<?=($selectedParentCategory==$item->id?'display: block':'display: none')?>">
                                        <?php


                                        foreach ($categoryclass->getSubCategories($item->id) as $cat)
                                        {
                                            $selected=(isset($productEdit)&&!empty($productEdit)&&($cat->id==$productEdit->categoryId)?"selected='selected'":"");
                                            echo "<option ".$selected." value=$cat->id>";
                                            echo "$cat->subject";
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                <?php
                                }
                                ?>
                            </div>

                            <div  style="display:none;" class="form-group">
                                <input name="weight" value="<?=(isset($productEdit)&&!empty($productEdit)?$productEdit->weight:'')?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="وزن">
                            </div>
                            <div  style="display:none;" class="form-group">
                                <input name="size" value="<?=(isset($productEdit)&&!empty($productEdit)?$productEdit->size:'')?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="اندازه">
                            </div>
                            <div class="form-group">
                                <input type="file" placeholder="لینک عکس" name="pic" class="form-control">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function selectedItem()
    {

        var cpval = document.getElementById("cpid").value;
        var items = document.getElementsByClassName("subCategory");
        // console.log();
        for (var i=0;i<items.length;i++)
        {
            items[i].style.display = "none";
        }
        document.getElementById("cid"+cpval).style.display = "block";
    }

</script>