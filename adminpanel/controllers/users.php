<?php

class Users extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if(isset($_GET['id'])&&!empty($_GET['id']))
        {
            $userClass = new user();
            $x=$userClass->delete($_GET['id']);
            if($x)
            {
                $_SESSION['error']=1;
                $_SESSION['errorMessage']='کاربر حذف شد';
            }
            else
            {
                $_SESSION['error']=1;
                $_SESSION['errorMessage']='خطا:کاربر حذف نشد';
            }
            header('location:'.http_admin().'users/index');
            exit();
        }
        $this->view->Render("users/index");
    }
    function newUser($id = false)
    {
        if(!empty($id))
        {
            $userClass = new user();
            $userEdit=$userClass->getUserById($id);
//            var_dump($userEdit);
            $this->view->Render("users/newUser");
        }
        else
        {
            $this->view->Render("users/newUser");
        }
    }

}