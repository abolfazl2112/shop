<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) && isset($_POST['cid']) && !empty($_POST['cid']))
{
    $catId = $_POST['cid'];
    $proClass = new product();
    echo json_encode($proClass->getProductInCategory($catId), JSON_UNESCAPED_UNICODE);
    exit();
}