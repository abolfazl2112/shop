<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) &&
    isset($_POST['oid']) && !empty($_POST['oid']) &&
    isset($_POST['uname']) && !empty($_POST['uname']) &&
    isset($_POST['pass']) && !empty($_POST['pass'])
)
{
    $orderId = $_POST['oid'];
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $userClass = new user();
    $userid = $userClass->checkUserExist($username,$password);
    if($userid)
    {
        $orderClass = new order();
        $order=$orderClass->getOrderObject($orderId);
        if($order->userid==$userid)
        {
            $orderproductClass = new orderproduct();
            echo json_encode($orderproductClass->getOrderProducts($orderId), JSON_UNESCAPED_UNICODE);
        }
        else
            echo 0;
    }
    else
        echo -1;
    exit();
}