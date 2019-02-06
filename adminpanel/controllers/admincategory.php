<?php

class adminCategory extends Controller
{
    function __construct()
    {
        parent::__construct();
        if(isset($_GET['delid'])&& !empty($_GET['delid']))
        {
            $deleteid = $_GET['delid'];
            $categoryclass = new category();
            if(!empty($deleteid) && $deleteid!=null)
            {
                $delresult=$categoryclass->delete($deleteid);
                $_SESSION['error'] = 1;
                $_SESSION['error_message'] = 'حذف شد';
            }
            else
            {
                $_SESSION['error'] = 0;
                $_SESSION['error_message'] = 'حذف نشد';
            }


            header('location:'.http_admin().'admincategory');
            exit();

        }
        $this->view->Render("category/index");
    }

    function newCategory($str = false)
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