
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            اسلایدشو
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>داشبورد</a></li>
            <li class="active">اسلایدشو</li>
        </ol>
    </section>
    <?php
    $expensions= array("jpg","png","jpeg","gif");

    if(isset($_FILES) && !empty($_FILES))
    {
        $filename = 'no_image.jpg';
        $posted=true;
        if(isset($_FILES['slide1']['name']) && !empty($_FILES['slide1']['name']) )
        {
            $filename='1.jpg';
            $fileInfo=$_FILES['slide1'];
            $filePach="/images/slider/";
        }
        else if(isset($_FILES['slide2']['name']) && !empty($_FILES['slide2']['name']))
        {
            $filename='2.jpg';
            $fileInfo=$_FILES['slide2'];
            $filePach="/images/slider/";
        }
        else if(isset($_FILES['slide3']['name']) && !empty($_FILES['slide3']['name']))
        {
            $filename='3.jpg';
            $fileInfo=$_FILES['slide3'];
            $filePach="/images/slider/";
        }
        else if(isset($_FILES['slide4']['name']) && !empty($_FILES['slide4']['name']))
        {
            $filename='4.jpg';
            $fileInfo=$_FILES['slide4'];
            $filePach="/images/slider/";
        }
        else if(isset($_FILES['banner1']['name']) && !empty($_FILES['banner1']['name']))
        {
            $filename='1.jpg';
            $fileInfo=$_FILES['banner1'];
            $filePach="/images/banner/";
        }
        else if(isset($_FILES['banner2']['name']) && !empty($_FILES['banner2']['name']))
        {
            $filename='2.jpg';
            $fileInfo=$_FILES['banner2'];
            $filePach="/images/banner/";
        }
        else
            $posted=false;

        if($posted)
        {

            $picname = explode('.', $fileInfo['name']);
            $file_ext = strtolower(end($picname));

            if (in_array($file_ext, $expensions) === false) {
                $_SESSION['error_message'] = '(پسوند فایل نا معتبر است.)';
            }
            $patch = get_path() . $filePach . $filename;
            unlink($patch);
            if (move_uploaded_file($fileInfo['tmp_name'], $patch)) {
                $_SESSION['error_message'] = '(فایل بارگذاری شد)';
            } else {
                $_SESSION['error_message'] = '(فایل بارگزاری نشد)';
            }
            $_SESSION['error']=1;
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
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">اسلایدشو</h3>
                    </div>
                    <div>
                        <div class="box-body">
                            <div class="form-group col-md-4" style="padding: 10px;">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div style="padding: 10px;" class="col-md-12"><img style="width: 100%" src="<?=http()?>/images/slider/1.jpg"></div>
                                    <div style="padding: 10px;" class="col-md-12"><input type="file" class="form-control" name="slide1"></div>
                                    <div style="padding: 10px;" class="col-md-12"><input value="ذخیره" type="submit" class="btn btn-block btn-success" ></div>
                                </form>
                            </div>
                            <div class="form-group col-md-4" style="padding: 10px;">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div style="padding: 10px;" class="col-md-12"><img style="width: 100%" src="<?=http()?>/images/slider/2.jpg"></div>
                                    <div style="padding: 10px;" class="col-md-12"><input type="file" class="form-control" name="slide2"></div>
                                    <div style="padding: 10px;" class="col-md-12"><input value="ذخیره" type="submit" class="btn btn-block btn-success" ></div>
                                </form>
                            </div>
                            <div class="form-group col-md-4" style="padding: 10px;">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div style="padding: 10px;" class="col-md-12"><img style="width: 100%" src="<?=http()?>/images/slider/3.jpg"></div>
                                    <div style="padding: 10px;" class="col-md-12"><input type="file" class="form-control" name="slide3"></div>
                                    <div style="padding: 10px;" class="col-md-12"><input value="ذخیره" type="submit" class="btn btn-block btn-success" ></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">تبلیغات</h3>
                    </div>
                    <div>
                        <div class="box-body">
                            <div class="form-group col-sm-6" style="padding: 10px;">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div style="padding: 10px;" class="col-md-12"><img style="width: 100%" src="<?=http()?>/images/banner/1.jpg"></div>
                                    <div style="padding: 10px;" class="col-md-12"><input type="file" class="form-control" name="banner1"></div>
                                    <div style="padding: 10px;" class="col-md-12"><input value="ذخیره" type="submit" class="btn btn-block btn-success" ></div>
                                </form>
                            </div>
                            <div class="form-group col-sm-6" style="padding: 10px;">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div style="padding: 10px;" class="col-md-12"><img style="width: 100%" src="<?=http()?>/images/banner/2.jpg"></div>
                                    <div style="padding: 10px;" class="col-md-12"><input type="file" class="form-control" name="banner2"></div>
                                    <div style="padding: 10px;" class="col-md-12"><input value="ذخیره" type="submit" class="btn btn-block btn-success" ></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

