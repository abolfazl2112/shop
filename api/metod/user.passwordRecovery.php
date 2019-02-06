<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) &&
    isset($_POST['mobile']) && !empty($_POST['mobile'])
)
{
    $mobile = $_POST['mobile'];

    $userClass = new user();
    $user = $userClass->getUserByMobile($mobile);
    if($user)
    {
        $sms = new kavenegarsms();
        $sms->sendsms(sprintf(message::$sendSmsPasswordRecovery,$user->password),array($mobile));
        echo '1';
    }
    else
        echo '0';
    exit();
}