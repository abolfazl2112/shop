<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) &&
    isset($_POST['uname']) && !empty($_POST['uname']) &&
    isset($_POST['pass']) && !empty($_POST['pass']) &&
    isset($_POST['id']) && !empty($_POST['id']) &&
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['mobile']) && !empty($_POST['mobile']) &&
    isset($_POST['address']) && !empty($_POST['address']) &&
    isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['family']) && !empty($_POST['family'])
)
{
    $userid = $userClass->checkUserExist($_POST['uname'],$_POST['pass']);
    if(!$userid || $userid!=$_POST['id'])
    {
        echo -2;//user Not exist
        exit();
    }
    $userClass = new user();
    $tblUser = new tbl_user();
    $tblUser->mobile = $_POST['mobile'];
    $tblUser->username = $_POST['username'];
    $tblUser->password = $_POST['password'];
    $tblUser->address = $_POST['address'];
    $tblUser->name = $_POST['name'];
    $tblUser->family = $_POST['family'];

    if($_POST['uname'] != $_POST['username'])
        if($userClass->getUserByUsername($tblUser->username))
        {
            echo -1;//user exist
            exit();
        }

    $x=$userClass->update($tblUser);
    if($x>0)
    {
        $sms = new kavenegarsms();
        $sms->sendsms(sprintf(message::$sendSmsUpdateProfile,$tblUser->password),array($tblUser->mobile));
        echo $x;
    }
    else
        echo 0;
    exit();
}