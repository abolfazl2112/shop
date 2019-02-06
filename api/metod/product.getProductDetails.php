<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) && isset($_POST['pid']) && !empty($_POST['pid']))
{
    $proId = $_POST['pid'];
    $proClass = new product();
    echo json_encode($proClass->getProductObject($proId), JSON_UNESCAPED_UNICODE);
    exit();
}