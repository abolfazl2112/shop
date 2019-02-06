<?php

class logout extends Controller
{
    function __construct()
    {
        parent::__construct();
        Session::Logout();
        header('location:'.http().'');
    }

    function run()
    {
        $this->model->run();
    }
}