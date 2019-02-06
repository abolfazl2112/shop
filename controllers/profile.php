<?php

	class Profile extends Controller
	{
		function __construct()
		{			
			parent::__construct();
			$this->view->Render("Profile/index");
		}
	}