<?php

class Forgetpassword extends Controller
{
    function __construct()
    {
        parent::__construct();

        $this->view->Render("forgetpassword/index");
    }

    function run()
    {
        $this->model->run();
    }
}