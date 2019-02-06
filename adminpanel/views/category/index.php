
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            دسته بندی
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>داشبورد</a></li>
            <li class="active">دسته بندی</li>
        </ol>
    </section>

    <?php
    $categoryclass = new category();
    $id=0;
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $id=$_GET['id'];
        $catEdit=$categoryclass->getCategory($id);
    }
    $expensions= array("jpg","png","jpeg","gif");
    if(isset($_POST['subject']) && !empty($_POST['subject']))
    {
        if($id>0)
        {
            $tblcat = $categoryclass->getCategory($id);
        }
        else
            $tblcat = new tbl_category();
        $filename = 'no_image.jpg';
        if (isset($_FILES['pic']['name']) && !empty($_FILES['pic']['name']))
        {
            $filename = explode('.', $_FILES['pic']['name']);
            $file_ext = strtolower(end($filename));

            if (in_array($file_ext, $expensions) === false) {
                $_SESSION['error_message'] .= '(پسوند فایل نا معتبر است.)';
            }

            $file_name = time() . '.' . $file_ext;
            $tblcat->pic = $file_name;

            $patch = get_path() . "/images/products/" . $file_name;
            if (move_uploaded_file($_FILES['pic']['tmp_name'], $patch)) {
                $_SESSION['error_message'] .= '(فایل بارگذاری شد)';
            } else {
                $_SESSION['error_message'] .= '(فایل بارگزاری نشد)';
            }
        }

        $tblcat->subject = (isset($_POST['subject']) && !empty($_POST['subject'])) ? $_POST['subject'] : ' ';
        $tblcat->description = (isset($_POST['description']) && !empty($_POST['description'])) ? $_POST['description'] : ' ';
//        $tblcat->pic = (isset($_POST['pic']) && !empty($_POST['pic'])) ? $_POST['pic'] : ' ';
        $tblcat->parentid = (isset($_POST['parentid']) && !empty($_POST['parentid'])) ? $_POST['parentid'] : '0';
        $tblcat->active = (isset($_POST['active']) && !empty($_POST['active'])) ? $_POST['active'] : '1';

        $tblcat->ressellerId = $adminID;
        $tblcat->userId = $adminID;

        $x=0;
        if($id>0)
        {
            $tblcat->id=$id;
            $x=$categoryclass->update($tblcat);
        }
        else
            $x = $categoryclass->insert($tblcat);

        if ($x > 0) {
            $_SESSION['error'] = 'success';
            $_SESSION['error_message'] = 'اطلاعات با موفقیت ذخیره شد';
        } else {
            $_SESSION['error'] = 'danger';
            $_SESSION['error_message'] = 'خطا در ثبت اطلاعات';
        }
    }



    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <?php

                if(isset($_SESSION['error']))
                {
                    ?>
                    <label style="display: block" class="alert alert-<?=$_SESSION['error']?>"><?=$_SESSION['error_message']?></label>
                    <?php
                    unset($_SESSION['error']);
                }

                ?>
                    <?php
                        if(isset($result))
                        {
                            if($result>0)
                            {
                                echo '<div class="alert alert-success">';
                                echo 'با موفقیت ثبت شد';
                            }
                            else
                            {
                                echo '<div class="alert alert-error">';
                                echo 'خطا در ثبت';
                            }
                            echo '</div>';
                        }
                    ?>

                <?php

                if(isset($_SESSION['error']))
                {
                    if($_SESSION['error']>0)
                    {
                        echo '<div class="alert alert-success">';
                        echo 'با موفقیت حذف شد';
                        echo '</div>';
                    }
                    else
                    {
                        echo '<div class="alert alert-error">';
                        echo 'حذف نشد';
                        echo '</div>';
                    }
                    unset($_SESSION['error']);
                }



                ?>

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">دسته بندی جدید</h3>
                    </div>
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" value="<?=($id>0&&isset($catEdit)?$catEdit->subject:'')?>" id="exampleInputEmail1" placeholder="نام">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?=($id>0&&isset($catEdit)?$catEdit->description:'')?>" name="description" placeholder="توضیحات">
                            </div>
                            <div class="form-group">
                                <select id="cpid" name="parentid" onchange="selectedItem();" class="form-control">
                                    <option>-</option>
                                    <?php
                                    $categoryclass = new category();
                                    $results = $categoryclass->getSubCategories(0);
                                    foreach ($results as $cat)
                                    {
                                        echo "<option value=$cat->id>";
                                        echo "$cat->subject";
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" placeholder="لینک عکس" name="pic" >
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">ذخیره</button>
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
                                <th>عکس</th>
                                <th>نام دسته بندی</th>
                                <th>توضیح</th>
                                <th>والد</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $catClass = new category();
                            foreach ($catClass->getCategories() as $item)
                            {
                                ?>
                                <tr>
                                    <td><img src="<?=http().'images/products/'.$item->pic?>" class="img-circle img-md"></td>
                                    <td><?=$item->subject?></td>
                                    <td><?=$item->description?></td>
                                    <td><?=($item->parentid>0?$catClass->getCategory($item->parentid)->subject:'-')?></td>
                                    <td>
                                        <a href="?op=edit&id=<?=$item->id?>" ><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="?delid=<?=$item->id?>" ><i class="fa fa-fw fa-remove"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>عکس</th>
                                <th>نام دسته بندی</th>
                                <th>توضیح</th>
                                <th>والد</th>
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

