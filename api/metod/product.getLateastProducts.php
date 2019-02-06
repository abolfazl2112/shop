<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) && isset($_POST['number']) && !empty($_POST['number']))
{
    $number = $_POST['number'];
    $proClass = new product();
    echo json_encode($proClass->getNewProducts($number), JSON_UNESCAPED_UNICODE);
    exit();
}