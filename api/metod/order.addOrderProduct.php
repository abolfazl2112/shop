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
    isset($_POST['oid']) && !empty($_POST['oid']) &&
    isset($_POST['pid']) && !empty($_POST['pid'])&&
    isset($_POST['number']) && !empty($_POST['number'])
)
{


    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $userClass = new user();
    $userid = $userClass->checkUserExist($username,$password);
    if($userid)
    {
        $orderClass = new order();
        $order = $orderClass->getOrderObject($_POST['oid']);
        if($order && $order->userid == $userid)
        {
            $productClass = new product();
            $product = $productClass->getProductObject($_POST['pid']);

            $tblOrderProduct = new tbl_orderproduct();
            $tblOrderProduct->orderid = $_POST['oid'];
            $tblOrderProduct->productid = $product->id;
            $tblOrderProduct->subject = $product->subject;
            $tblOrderProduct->picName = $product->picName;
            $tblOrderProduct->priceBuy = $product->priceBuy;
            $tblOrderProduct->number = $_POST['number'];
            $tblOrderProduct->priceSell = $product->priceSell;
            $tblOrderProduct->total = $tblOrderProduct->priceSell * $tblOrderProduct->number;

            $orderProductClass = new orderproduct();
            $x=$orderProductClass->insert($tblOrderProduct);
            if($x>0)
                echo $x;
            else
                echo 0;
        }
        else
            echo -1;
    }
    else
        echo -1;
    exit();
}