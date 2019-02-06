<?php
class invoce extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->Render("invoce/index");
    }

    function invoce($str = false)
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


