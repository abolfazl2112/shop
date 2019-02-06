<?php

class Logout extends Controller
{
    function __construct()
    {
        parent::__construct();
        Session::AdminLogout();
        $this->view->Render("login/index");
    }
}