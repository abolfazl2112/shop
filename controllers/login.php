<?php

class Login extends Controller
{
	function __construct()
	{
		parent::__construct();
        if(
            isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST['password']) && !empty($_POST['password'])
        )
        {
            $userClass = new user();
            $user = $userClass->getUserByUsername($_POST['username']);
            if($user && $user->password == $_POST['password'])
            {
                Session::LoginDo('uid',$user->id,$user->username);
                header('location:'.http().'myorders');
                exit();
            }
            else
            {
                $_SESSION['error']= 1;
                $_SESSION['error_message']= 'نام کاربری یا رمز عبور اشتباه است';
            }
        }
		$this->view->Render("login/index");
	}
	
	function run()
	{		
		$this->model->run();		
	}
}