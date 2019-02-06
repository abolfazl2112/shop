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
    isset($_POST['rid']) && !empty($_POST['rid']) &&
    isset($_POST['filter']) && !empty($_POST['filter'])
)
{
    $userClass = new user();
    $userid = $userClass->checkUserExist($_POST['uname'],$_POST['pass']);
    if(!$userid)
    {
        echo -2;//user Not exist
        exit();
    }
    $currentUser = $userClass->getUserById($userid);
    if(!$currentUser || $currentUser->admin != 1)
    {
        echo -3;//user Not admin
        exit();
    }

    $filter = $_POST['filter'];
    $resseller = $_POST['rid'];
    $start = (isset($_POST['start']) && !empty($_POST['start'])?$_POST['start']:'0');
    $end = (isset($_POST['end']) && !empty($_POST['end'])?$_POST['end']:'20');
    $proClass = new product();
    echo json_encode($proClass->getFilterProduct($resseller,$filter,$start,$end), JSON_UNESCAPED_UNICODE);
    exit();
}