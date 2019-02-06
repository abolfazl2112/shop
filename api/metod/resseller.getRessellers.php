<?php
/**
 * Created by Novin Tandis Company.
 * User: Abolfazl Shahrad Shahri
 * Date: 10/04/2017
 * Time: 11:22
 */
include_once '../../libs/include.all.php';


if(!empty($_POST))
{
    $userClass = new user();
    echo json_encode($userClass->getResseller(), JSON_UNESCAPED_UNICODE);
    exit();
}