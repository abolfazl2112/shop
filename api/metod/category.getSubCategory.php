<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) && isset($_POST['cid']))
{
    $categoryId = $_POST['cid'];
    $catClass = new category();
    echo json_encode($catClass->getSubCategories($categoryId), JSON_UNESCAPED_UNICODE);
    exit();
}