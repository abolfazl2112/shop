
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            کاربران
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>داشبورد</a></li>
            <li class="active">کاربران</li>
        </ol>
    </section>
    <?php

    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12" style="display: none;">
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
                        <h3 class="box-title">جستجو</h3>
                    </div>
                    <form role="form" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="شناسه کاربر">
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
                        <table id="tablelistview" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>عکس</th>
                                <th>نام</th>
                                <th>نام کاربری</th>
                                <th>موبایل</th>
                                <th>مدیر</th>
                                <th>فعال</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $userClass = new user();
                            foreach ($userClass->getUsers() as $item)
                            {
                                ?>
                                <tr>
                                    <td><img class="img-circle img-md" src="<?=http()?>images/users/<?=$item->picture?>"></td>
                                    <td><?=$item->name.' '.$item->family?></td>
                                    <td><?=$item->username?></td>
                                    <td><?=$item->mobile?></td>
                                    <td><?=($item->admin>0?'<i class="fa fa-fw fa-check"></i>':'')?></td>
                                    <td><?=($item->active>0?'<i class="fa fa-fw fa-check"></i>':'')?></td>
                                    <td>
                                        <a href="<?=http_admin()?>users/newUser/?id=<?=$item->id?>"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="<?=$item->username=='administrator'||$item->username=='admin'?'':http_admin()."users/index/?id=".$item->id?>"><i class="fa fa-fw fa-remove"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>عکس</th>
                                <th>نام</th>
                                <th>نام کاربری</th>
                                <th>موبایل</th>
                                <th>مدیر</th>
                                <th>فعال</th>
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