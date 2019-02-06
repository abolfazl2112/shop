<?php

class Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	
	function loadModel($name)
	{
		$path = "models/".$name."_model.php";
		
		if(file_exists($path))
		{
			require($path);
			
			$ModelName = $name."_model";
			$this->model = new $ModelName();
		}
	}	
}

