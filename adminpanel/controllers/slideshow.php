<?php

class Slideshow extends controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->Render("slideshow/index");
    }
}