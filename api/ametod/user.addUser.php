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
    isset($_POST['pass']) && !empty($_POST['pass'])&&
    isset($_POST['name']) && !empty($_POST['name'])&&
    isset($_POST['family']) && !empty($_POST['family'])&&
    isset($_POST['father']) && !empty($_POST['father'])&&
    isset($_POST['mobile']) && !empty($_POST['mobile'])&&
    isset($_POST['username']) && !empty($_POST['username'])&&
    isset($_POST['password']) && !empty($_POST['password'])&&
    isset($_POST['address']) && !empty($_POST['address'])&&
    isset($_POST['admin']) && !empty($_POST['admin'])
)
{
    $userClass = new user();
    $userid = $userClass->checkUserExist($_POST['uname'],$_POST['pass']);
    if(!$userid || $userid!=$_POST['id'])
    {
        echo -2;//user Not exist
        exit();
    }
    $currentUser = $userClass->getUserById($userid);
    if(!$currentUser && $currentUser->admin == 1)
    {
        $tblUser=new tbl_user();
        $tblUser->name=$_POST['name'];
        $tblUser->family=$_POST['family'];
        $tblUser->father=$_POST['father'];
        $tblUser->mobile=$_POST['mobile'];
        $tblUser->username=$_POST['username'];
        $tblUser->password=$_POST['password'];
        $tblUser->address=$_POST['address'];
        $tblUser->picture=isset($_POST['picture'])&&!empty($_POST['picture'])?$_POST['picture']:'';
        $tblUser->date=jdate('omd','','','','en');
        $tblUser->time=jdate('His','','','','en');
        $x=$userClass->signUp($tblUser);
        if ($x>0)
        {
            echo json_encode($userClass->getUserById($x), JSON_UNESCAPED_UNICODE);
        }
        else
            echo 0;
    }
    else
    {
        echo -3;//user Not admin
        exit();
    }
    exit();
}