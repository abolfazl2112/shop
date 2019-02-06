<?php
class categories extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->Render("categories/index");
    }

    function categories($str = false)
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


