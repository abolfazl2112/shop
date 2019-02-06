<?php
class Bootstrap
{
	function    __construct()
	{
		if(!isset($_GET['url']))
		{
			$url = 'index';
		}
		else
		{
			$url = $_GET['url'];
		}
		
		$url = explode('/', $url);
		//print_r($url);
		
		if(!file_exists("controllers/".$url[0].".php"))
		{
			echo "Not Found Page "."controllers/".$url[0].".php";
		}
		else
		{
			$file = "controllers/".$url[0].".php";
			require($file);
			$controller = new $url[0]();
			$controller->loadModel($url[0]);


			if(!empty($url[1]))
			{
				$method_name = $url[1];

				if(method_exists($controller, $method_name))
				{

					if(!empty($url[2]))
					{
						$parametr = $url[2];
						$controller->$method_name($parametr);
					}
					else
					{
						$controller->$method_name();
					}
				}
				else
				{
					echo "<br>method not found<br>";
				}
			}	
		}
	}	
}