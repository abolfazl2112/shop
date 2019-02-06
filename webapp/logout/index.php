<?php
include_once("../_layout/header.php");
Session::Logout();
header('location:'.http().'webapp/login')
?>