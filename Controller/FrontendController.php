<?php

class FrontendController extends Manager
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

	public function login()
	{

		require('View/Frontend/connexion.php');

	}

	public function inscription()
	{
		require('View/Frontend/inscription.php');

		if (!empty($_POST)) 
		{
			$errors = array();

			if(empty($_POST['user_first_name']) || $_POST['user_first_name'])
			{
				$errors['user_first_name'] = " Prénom invalide ";
			}
			
			if(empty($_POST['user_name']) || $_POST['user_name'])
			{
				$errors['user_name'] = "Nom invalide ";
			} 

			if(empty($_POST['user_pseudo']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['user_pseudo']))
			{
				$errors['user_pseudo'] = " Votre pseudo n'est pas valide ";
			}
			
			if(empty($_POST['user_email']) || !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL))
			{
				$errors['user_email'] = "Email non valide ";
			} 

			if(empty($_POST['user_password']) || $_POST['user_password'] != $_POST['user_confirmpass'])
			{
				$errors['user_password'] = "Vos mots de passe ne corresponde pas";
			}

			if($errors)
			{

				$userManager = new UserManager; 

				if(empty($userManager->exists($_POST['user_pseudo'])))
				{
					$hashedPass = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

					$user = new User ([

						'user_first_name' => $_POST['user_first_name'],
						'user_name'	=> $_POST['user_name'],
						'user_pseudo' => $_POST['user_pseudo'],
						'user_password' => $hashedPass,
						'user_email' => $_POST['user_email']

					]);

					$userManager->add($user);
				}

			}

		}
	}
}