<?php

class register extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->Render("register/index");
    }

    function register($str = false)
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