<?php
class message
{
    function __construct()
    {

    }
    public static $updateSuccess = "ویرایش شد";
    public static $deleteSuccess = "حذف شد";
    public static $addSuccess = "اضافه شد";


    public static $sendSmsSuccessSignUp = 'نام کاربری شماره موبایل شماست و رمز عبور شما: %s';
    public static $sendSmsSaveOrder = 'سفارش شما به شماره %s با موفقیت ثبت شد';
    public static $sendSmsUpdateProfile = 'اطلاعاعات شما با موفقیت ویرایش شد';
    public static $sendSmsPasswordRecovery = 'رمز عبور شما : %s';
}