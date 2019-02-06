<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST) && isset($_POST['rid']) && !empty($_POST['rid']))
{
    $resseller = $_POST['rid'];
    $catClass = new category();
    echo json_encode($catClass->getCategoriesResseller($resseller), JSON_UNESCAPED_UNICODE);
    exit();
}