<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(
    !empty($_POST) && isset($_POST['uname']) && !empty($_POST['uname']) &&
    !empty($_POST) && isset($_POST['pass']) && !empty($_POST['pass']) &&
    !empty($_POST) && isset($_POST['rid']) && !empty($_POST['rid'])
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
    $catClass = new category();
    echo $catClass->getCategoriesResseller($_POST['rid']);
    exit();
}