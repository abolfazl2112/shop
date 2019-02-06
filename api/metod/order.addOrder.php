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
    isset($_POST['rid'])  &&
    isset($_POST['price']) && !empty($_POST['price']) &&
    isset($_POST['description']) && !empty($_POST['description'])
)
{
    $tblOrder = new tbl_order();
    $tblOrder->orderid = '';
    $tblOrder->ressellerid = $_POST['rid'];
    $tblOrder->price = $_POST['price'];
    $tblOrder->discountcode = $_POST['discountcode'];
    $tblOrder->description = $_POST['description'];
    $tblOrder->paymenttype = $_POST['paymenttype'];
    $tblOrder->count = (isset($_POST['count']) && !empty($_POST['count'])) ? $_POST['count'] : '0';
    $tblOrder->date = jdate('omd','','','','en');
    $tblOrder->time = jdate('His','','','','en');

    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $userClass = new user();
    $userid = $userClass->checkUserExist($username,$password);
    
    if($userid)
    {

        $tblOrder->userid = $userid;
        $usernamefamily = $userClass->getUserById($userid);
        $tblOrder->customername = $usernamefamily->name . ' ' . $usernamefamily->family;
        $orderClass = new order();

        $x=$orderClass->insert($tblOrder);
        if($x>0)
            echo $x;
        else
            echo 0;
    }
    else
        echo -1;
    exit();
}
