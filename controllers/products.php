<?php

class products extends Controller
{
    function __construct()
    {
        parent::__construct();
        if(isset($_GET['id']) && !empty($_GET['id']))
        {
            $id = $_GET['id'];
        }
        else
        {
            header('location:'.http().'categories');
            exit();
        }
        $this->view->Render("products/index");
    }
    //
    function products($str = false)
    {
//        if(empty($str) == false)
//        {
//            echo '<br>........'.$str.'..........<br>';
//        }
//        else
//        {
//            echo '<br>........About Me..........<br>';
//        }
    }
}