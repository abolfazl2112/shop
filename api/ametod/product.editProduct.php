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
    isset($_POST['id']) && !empty($_POST['id'])&&
    isset($_POST['cid']) && !empty($_POST['cid'])&&
    isset($_POST['rid']) && !empty($_POST['rid'])&&
    isset($_POST['subject']) && !empty($_POST['subject'])&&
    isset($_POST['description']) && !empty($_POST['description'])&&
    isset($_POST['picName']) && !empty($_POST['picName'])&&
    isset($_POST['priceBuy']) && !empty($_POST['priceBuy'])&&
    isset($_POST['priceSelltmp']) && !empty($_POST['priceSelltmp'])&&
    isset($_POST['priceSell']) && !empty($_POST['priceSell'])&&
    isset($_POST['number']) && !empty($_POST['number'])&&
    isset($_POST['weight']) && !empty($_POST['weight'])&&
    isset($_POST['size']) && !empty($_POST['size'])&&
    isset($_POST['active']) && !empty($_POST['active'])
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
        $proClass = new product();
        $tblPro = $proClass->getProductObject($_POST['id']);
        $tblPro->categoryId =$_POST['cid'];
        $tblPro->ressellerId=$_POST['rid'];
        $tblPro->userId=$userid;
        $tblPro->subject=$_POST['subject'];
        $tblPro->description=$_POST['description'];
        $tblPro->picName=$_POST['picName'];
        $tblPro->priceBuy=$_POST['priceBuy'];
        $tblPro->priceSelltmp=$_POST['priceSelltmp'];
        $tblPro->priceSell=$_POST['priceSell'];
        $tblPro->number=$_POST['number'];
        $tblPro->weight=$_POST['weight'];
        $tblPro->size=$_POST['size'];
        $tblPro->active=$_POST['active'];
        $x=$proClass->update($tblPro);
        if ($x>0)
        {
            echo $x;
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