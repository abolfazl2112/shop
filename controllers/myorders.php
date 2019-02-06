<?php
class myorders extends Controller
{
    function __construct()
    {
        parent::__construct();
        if(session::IsLogin())
        {
            $this->view->Render("myorders/index");
        }
        else
        {
            header('location:'.http());
            exit();
        }

    }

}


