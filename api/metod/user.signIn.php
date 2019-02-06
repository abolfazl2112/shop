<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) &&
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password'])
)
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userClass = new user();
    $userid= $userClass->checkUserExist($username,$password);
    if($userid)
        echo json_encode($userClass->getUserById($userid), JSON_UNESCAPED_UNICODE);
    else
        echo '0';
    exit();
}