<?php
$userClass = new user();
$expensions= array("jpg","png","jpeg","gif");
$id=0;
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id=$_GET['id'];
    $userEdit=$userClass->getUserById($id);
}
if(
    isset($_POST['name']) && !empty($_POST['name'])
)
{
    if($id>0)
        $tbluser=$userClass->getUserById($id);
    else
        $tbluser= new tbl_user();

    $_SESSION['error_message']='';
    $filename='';
    if(isset($_FILES['picture']['name']) && !empty($_FILES['picture']['name']))
    {
        $filename = explode('.',$_FILES['picture']['name']);
        $file_ext=strtolower(end($filename));

        if(in_array($file_ext,$expensions)=== false)
        {
            $_SESSION['error_message'] .= '(پسوند فایل نا معتبر است.)';
        }

        $file_name = time().'.'.$file_ext;
        $tbluser->picName = $file_name;

        $patch = get_path()."/images/users/".$file_name;
        if(move_uploaded_file($_FILES['picture']['tmp_name'],$patch))
        {
            $_SESSION['error_message'].='(فایل بارگذاری شد)';
        }
        else
        {
            $_SESSION['error_message'].='(فایل بارگزاری نشد)';
        }
    }

    $tbluser->name = $_POST['name'];
    $tbluser->family = $_POST['family'];
    $tbluser->mobile = $_POST['mobile'];
    $tbluser->birthdate = '13960101';
    $tbluser->username = $_POST['username'];
    $tbluser->password = $_POST['password'];
    $tbluser->date = ($id>0?$tbluser->date:jdate('omd','','','','en'));
    $tbluser->time = ($id>0?$tbluser->time:jdate('His','','','','en'));
    $tbluser->admin = $_POST['admin'];
    $tbluser->active = $_POST['active'];

    $x=0;
    if($id>0)
        $x=$userClass->update($tbluser);
    else
        $x=$userClass->signUp($tbluser);
    if($x>0)
    {
        $_SESSION['error']= 'success';
        $_SESSION['error_message'] .= 'اطلاعات با موفقیت ذخیره شد';
    }
    else
    {
        $_SESSION['error']= 'error';
        $_SESSION['error_message'] .= 'خطا در ثبت اطلاعات';
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>داشبورد</a></li>
            <li class="active"><?php if(isset($userEdit))echo 'ویرایش کاربر'; else echo 'کاربر جدید'?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(isset($_SESSION['error'])&&!empty($_SESSION['error']))
                {
                    ?>
                <label class="alert alert-<?=$_SESSION['error']?> " style="display: block;"><?=$_SESSION['error_message']?></label>
                <?php
                    unset($_SESSION['error']);
                    unset($_SESSION['error_message']);
                }
                ?>
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php if(isset($userEdit))echo 'ویرایش کاربر'; else echo 'کاربر جدید'?></h3>
                    </div>
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <input name="username" value="<?=(isset($userEdit)&&!empty($userEdit)?$userEdit->username:'')?>" type="text" class="form-control" id="exampleInputEmail1" placeholder="نام کاربری">
                            </div>
                            <div class="form-group">
                                <input name="password" value="<?=(isset($userEdit)&&!empty($userEdit)?$userEdit->password:'')?>"  type="text" class="form-control" id="exampleInputPassword1" placeholder="رمز عبور">
                            </div>
                            <div class="form-group">
                                <input name="name" value="<?=(isset($userEdit)&&!empty($userEdit)?$userEdit->name:'')?>" type="text" class="form-control" id="exampleInputEmail1" placeholder="نام">
                            </div>
                            <div class="form-group">
                                <input name="family" value="<?=(isset($userEdit)&&!empty($userEdit)?$userEdit->family:'')?>"  type="text" class="form-control" id="exampleInputPassword1" placeholder="نام خانوادگی">
                            </div>
                            <div class="form-group">
                                <input name="mobile" value="<?=(isset($userEdit)&&!empty($userEdit)?$userEdit->mobile:'')?>"  type="text" class="form-control" id="exampleInputPassword1" placeholder="موبایل">
                            </div>
                            <div class="form-group">
                                <select name="admin" class="form-control">
                                    <option value="0">کاربر عادی</option>
                                    <option value="1">مدیر</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="file" name="picture"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <select name="active" class="form-control">
                                    <option value="1">فعال</option>
                                    <option value="0">غیرفعال</option>
                                </select>
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