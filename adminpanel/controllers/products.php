<?php

class Products extends Controller
{
    function __construct()
    {
        parent::__construct();
//        $this->view->Render("products/index");
    }
    function index($str = false)
    {
        $this->view->Render("products/index");
    }
    //
    function newProduct($id = false)
    {

        if(empty($id) == false)
        {
            $productClass = new product();
            $productEdit = $productClass->getProduct($id);
            $this->view->Render("products/newProduct");
        }
        else
        {
            $this->view->Render("products/newProduct");
        }
    }
}