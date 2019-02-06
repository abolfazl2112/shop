<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) &&
    isset($_POST['mobile']) && !empty($_POST['mobile']) &&
    isset($_POST['address']) && !empty($_POST['address']) &&
//    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['family']) && !empty($_POST['family'])
)
{
    $userClass = new user();
    $tblUser = new tbl_user();
    $tblUser->mobile = $_POST['mobile'];
    $tblUser->username = $_POST['mobile'];
    $tblUser->password = rand(10000,99999);
    $tblUser->address = $_POST['address'];
    $tblUser->name = $_POST['name'];
    $tblUser->family = $_POST['family'];

    if($userClass->getUserByUsername($tblUser->username))
    {
        echo -1;//user exist
        exit();
    }

    if($userClass->getUserByMobile($tblUser->mobile))
    {
        echo -1;//user exist
        exit();
    }

    $x=$userClass->signUp($tblUser);
    if($x>0)
    {
        $sms = new kavenegarsms();
        $sms->sendsms(sprintf(message::$sendSmsSuccessSignUp,$tblUser->password),array($tblUser->mobile));
        echo $x;
    }
    else
        echo 0;
    exit();
}