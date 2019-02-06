<?php
function http()
{
    return "http://selenshop.ir/";
}
function get_path()
{
    return $_SERVER['DOCUMENT_ROOT']."";
}
function http_admin()
{
    return http()."adminpanel/";
}
function http_user()
{
    return http()."portal/";
}

?>