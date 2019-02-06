<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) &&
    isset($_POST['rid']) && !empty($_POST['rid']) &&
    isset($_POST['filter']) && !empty($_POST['filter'])
)
{
    $filter = $_POST['filter'];
    $resseller = $_POST['rid'];
    $start = (isset($_POST['start']) && !empty($_POST['start'])?$_POST['start']:'0');
    $end = (isset($_POST['end']) && !empty($_POST['end'])?$_POST['end']:'20');
    $proClass = new product();
    echo json_encode($proClass->getFilterProduct($resseller,$filter,$start,$end), JSON_UNESCAPED_UNICODE);
    exit();
}