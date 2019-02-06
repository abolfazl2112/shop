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
    isset($_POST['body']) && !empty($_POST['body'])
)
{
    $mobile = $_POST['mobile'];
    $body = $_POST['body'];
    $sms = new kavenegarsms();
    $sms->sendsms($body,array($mobile));
    echo 1;
    exit();
}