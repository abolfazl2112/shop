<?php
class basket extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->Render("basket/index");
    }

    function basket($str = false)
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


