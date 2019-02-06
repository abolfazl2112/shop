<?php

class View
{
	function __construct()
	{
		$this->result = "OK";
	}
	
	function Render($name)
	{
        $settingClass = new setting();
        $currentSetting = $settingClass->getSetting(1);

		require("views/_layout/header.php");
		require("views/".$name.".php");
		require("views/_layout/footer.php");
	}
		
}