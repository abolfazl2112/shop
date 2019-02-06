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
    isset($_POST['id']) && !empty($_POST['id'])
)
{
    $id = $_POST['id'];

    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $userClass = new user();
    $userid = $userClass->checkUserExist($username,$password);
    if($userid)
    {
        $settingClass = new setting();
        $setting = $settingClass->getSetting(1);
        echo json_encode($setting, JSON_UNESCAPED_UNICODE);
    }
    else
        echo 0;
    exit();
}