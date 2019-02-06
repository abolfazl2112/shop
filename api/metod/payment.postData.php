<?php
session_start();
include_once '../../config/database.php';
include_once '../../libs/database.php';
include_once '../../models/tables/tbl_user.php';
include_once '../../models/tables/tbl_order.php';
include_once '../../models/repository/user.php';
include_once '../../models/repository/order.php';
include_once '../../models/tools/http.php';
include_once '../../models/tools/tools.php';
include_once '../../models/tools/jdf.php';
include_once '../../models/repository/user.php';


if(!empty($_GET) &&
    isset($_GET['username']) && !empty($_GET['username']) &&
    isset($_GET['password']) && !empty($_GET['password']) &&
    isset($_GET['orderid']) && !empty($_GET['orderid'])
) {
    $person = new user();
    $username = isset($_GET['username']) ? $_GET['username'] : '';

    $orderid = isset($_GET['orderid']) ? $_GET['orderid'] : '';

    $user = $person->getUserByUsername($username);

    $orderClass = new order();
    $order=$orderClass->getOrderObject($orderid);
    if(!$user)
    {
        echo 0;exit();
    }
    $MerchantID = '0034583a-cee0-11e7-8397-000c295eb8fc';
    $_SESSION['amount']=$order->price ;
    $_SESSION['username_value']=$username ;
    $Description = 'افزایش اعتبار';
    $CallbackURL = http().'api/metod/payment.result.php';
    $Email = $user->name;
    $Mobile = $user->mobile;

    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
    $result = $client->PaymentRequest(
        [
            'MerchantID' => $MerchantID,
            'Amount' => $order->price,
            'Description' => $Description,
            'Email' => $Email,
            'Mobile' => $Mobile,
            'CallbackURL' => $CallbackURL,
        ]
    );

    if ($result->Status == 100)
        header('location: https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
    else
        echo 'ERR: ' . $result->Status;
}
?>