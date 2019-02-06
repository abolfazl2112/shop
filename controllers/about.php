<?php

class About extends Controller
{
	function __construct()
	{
		parent::__construct();
		
		//echo "<br>Page About ";
		
		$this->view->Render("About/index");
	}
	// 
	function AboutMe($str = false)
	{
		if(empty($str) == false)
		{
			echo '<br>........'.$str.'..........<br>';
		}
		else
		{
			echo '<br>........About Me..........<br>';
		}
	}
}