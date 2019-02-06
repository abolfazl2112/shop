<?php
?>

<!-- right side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="<?=http_admin()?>template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p><?=$currentUser->name.' '.$currentUser->family?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">منو</li>
            <li>
                <a href="<?=http_admin()?>index">
                    <i class="fa fa-envelope"></i> <span>داشبورد</span>
                    <span class="pull-left-container">
<!--              <small class="label pull-left bg-yellow">۱۲</small>-->
                        <!--              <small class="label pull-left bg-green">۱۶</small>-->
                        <!--              <small class="label pull-left bg-red">۵</small>-->
            </span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>دسته بندی ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=http_admin()?>admincategory"><i class="fa fa-circle-o"></i>لیست دسته بندی ها</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>محصولات</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=http_admin()?>products/newProduct"><i class="fa fa-circle-o"></i>محصول جدید</a></li>
                    <li><a href="<?=http_admin()?>products/index"><i class="fa fa-circle-o"></i> لیست محصولات</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>سفارشات</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=http_admin()?>orders/index"><i class="fa fa-circle-o"></i>سفارشات</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>کاربران</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-left pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=http_admin()?>users/index"><i class="fa fa-circle-o"></i>لیست کاربران </a></li>
                    <li><a href="<?=http_admin()?>users/newUser"><i class="fa fa-circle-o"></i>کاربر جدید</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>اسلایدشو</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=http_admin()?>slideshow"><i class="fa fa-circle-o"></i>اسلایدشو</a></li>
                </ul>
            </li>

<!--            <li>-->
<!--                <a href="--><?//=http_admin()?><!--support">-->
<!--                    <i class="fa fa-envelope"></i> <span>پشتیبانی</span>-->
<!--                    <span class="pull-left-container">-->
<!--              <small class="label pull-left bg-yellow">۱۲</small>-->
<!--              <small class="label pull-left bg-green">۱۶</small>-->
<!--              <small class="label pull-left bg-red">۵</small>-->
<!--            </span>-->
<!--                </a>-->
<!--            </li>-->

<!--            <li>-->
<!--                <a href="--><?//=http_admin()?><!--setting">-->
<!--                    <i class="fa fa-th"></i> <span>تنظیمات</span>-->
<!--                    <span class="pull-left-container"></span>-->
<!--                </a>-->
<!--            </li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
