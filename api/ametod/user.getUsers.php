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
    isset($_POST['pass']) && !empty($_POST['pass'])
)
{
    $start = (isset($_POST['start']) && !empty($_POST['start'])?$_POST['start']:'-1');
    $end = (isset($_POST['end']) && !empty($_POST['end'])?$_POST['end']:'-1');

    $userClass = new user();
    $userid = $userClass->checkUserExist($_POST['uname'],$_POST['pass']);
    if(!$userid || $userid!=$_POST['id'])
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

    echo json_encode($userClass->getAllUsers($start,$end), JSON_UNESCAPED_UNICODE);
    exit();
}