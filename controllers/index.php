<?php

class Index extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->view->Render("index/index");
	}

}