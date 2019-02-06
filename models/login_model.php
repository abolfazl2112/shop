<?php

class Login_Model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function run()
	{	
		if(isset($_POST["txt_User"]) && isset($_POST["txt_Pass"]))
		{
			$user = $_POST["txt_User"];
			$pass = $_POST["txt_Pass"];
		}
		if(!empty($user) && !empty($pass))
		{
			$qurey = $this->db->prepare("select * from tlb_UserPass where 
											username = :userlogin and password = md5(:passlogin)");
			
			$qurey->execute(array(":userlogin" => $user, ":passlogin" => $pass));
			
			$count = $qurey->rowcount();
			
			if($count > 0)
			{
				//echo "<br>welcome";
				Session::LoginDo("Login", "success", $user);
				header("location: ../index");
			}
			else
			{
				//echo "<br>Invalid Username Or Password";
				header("location: ../login");				
			}
		}
	}
}
