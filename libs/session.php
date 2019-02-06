<?php

	class Session
	{
		public static function init()
		{
			@session_start();
		}
		
		public static function IsLogin()
		{	
			Session::init();
			if(isset($_SESSION["Uname"]))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public static function LoginDo($key, $value, $username)
		{
			Session::init();
			$_SESSION[$key] = $value;
			
			$_SESSION["Uname"] = $username;
		}
		
		public static function GetUserLogin()
		{
			return $_SESSION["Uname"];
		}
		
		public static function Logout()
		{
			session_destroy();
//			header("location: ../index");
		}

        public static function AdminLogin($id)
        {
            Session::init();
            $_SESSION["AdminLoginID"] = $id;
        }

        public static function GetAdminLoginID()
        {
            Session::init();
            return $_SESSION["AdminLoginID"];
        }

        public static function AdminLogout()
        {
            session_destroy();
            header("location: ".http_admin()."login");
        }

	}