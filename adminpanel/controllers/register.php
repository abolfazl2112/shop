<?php

class Register extends Controller
{
    function __construct()
    {
        parent::__construct();

        $this->view->Render("register/index");
    }

    function run()
    {
        $this->model->run();
    }
}