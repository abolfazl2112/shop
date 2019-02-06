

<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="<?=http()?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?=http()?>contactus">تماس با ما</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h1 class="title">تماس با ما</h1>
                <h3 class="subtitle"></h3>
                <div class="row">
                    <div class="col-sm-3"><img src="<?=http()?>images/banner/contactus.jpg" alt="<?=$currentSetting->name?>" title="<?=$currentSetting->name?>" class="img-thumbnail" /></div>
                    <div class="col-sm-3"><strong><?=$currentSetting->name?></strong><br />
                        <address>
                            <?=$currentSetting->address?>
                        </address>
                    </div>
                    <div class="col-sm-3"><strong>شماره تلفن</strong><br>
                        <?=$currentSetting->tell?><br />
                        <br />
                        <strong>موبایل</strong><br>
                        <?=$currentSetting->mobile?> </div>
                    <div class="col-sm-3">
                        <strong>ساعات کار</strong>
                        <br />
                        خدمات مشتریان 7 الی 24
                        <br />
                        <br />
                        <strong></strong>
                        <br />
                    </div>
                </div>
                <form class="form-horizontal">
                    <fieldset>
                        <h3 class="subtitle"></h3>
                        <div class="form-group required">
                            <label class="col-md-2 col-sm-3 control-label" for="input-name">نام شما</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="text" name="name" value="" id="input-name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-md-2 col-sm-3 control-label" for="input-name">موبایل</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="text" name="name" value="" id="input-name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-sm-3 control-label" for="input-email">آدرس ایمیل</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="text" name="email" value="" id="input-email" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-md-2 col-sm-3 control-label" for="input-enquiry">درخواست شما</label>
                            <div class="col-md-10 col-sm-9">
                                <textarea name="enquiry" rows="10" id="input-enquiry" class="form-control"></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons">
                        <div class="pull-right">
                            <input class="btn btn-primary" type="submit" value="ارسال" />
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End -->
        </div>
    </div>
</div>