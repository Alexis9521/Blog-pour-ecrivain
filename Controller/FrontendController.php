<?php

class FrontendController
{

	public function home()
	{

		require('View/Frontend/home.php');

	}

	public function article()
	{

		require('View/Frontend/article.php');

	}

	public function contact()
	{

		require('View/Frontend/contact.php');

	}

	public function connection()
	{

		require('View/Frontend/connexion.php');

	}

	public function inscription()
	{
/*
		if (empty($_POST)) 
		{
			$validation = true;

			if(empty($_POST['user_pseudo']) || ($_POST['user_email']) || ($_POST['user_password']) || ($_POST['user_confirmpass']))
			{
				$validation = false;
				$error = 1;
			}
			if (strlen($_POST['user_pseudo']) > 50 || ($_POST['user_email']) > 255 ($_POST['user_password']) 6 <  && > 50)
			{
				$validation = false;
			}
			if(!(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['user_mail'])))
			{
				$validation = false;
			}
			if($validation)
			{
				$userManager = new UserManager();

				if(empty($userManager->exist($_POST['user_pseudo'])))
				{
					$hashpass = password_hash($_POST['user_password'], PASSWORD_DEFAULT);


					$user = new User
					([
						'pseudo' => $_POST['user_pseudo'],
						'user_pass' => $hashpass,
						'user_email' => $_POST['user_email']
					]);

					// redirection vers la function add user 
				}
			}
		}

		switch ($error) {
			case 1:
				$error = '<p>'
				break;
			case 2:			

		}
*/

		require('View/Frontend/inscription.php');

	}
}