<?php

class contactus extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->Render("contactus/index");
    }
}