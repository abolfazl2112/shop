<?php

	class Profile extends controller
	{
		function __construct()
		{			
			parent::__construct();
			$this->view->Render("profile/index");
		}
	}