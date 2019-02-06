<?php

class orders extends Controller
{
    function __construct()
    {
        parent::__construct();

    }

    function index()
    {
        $this->view->Render("order/index");
    }

    function orderDetails()
    {
        $this->view->Render("order/orderDetails");
    }
}