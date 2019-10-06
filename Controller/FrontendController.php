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

	public function login()
	{

		require('View/Frontend/connexion.php');

	}

	public function inscription()
	{
		require_once('Model/Manager.php');

		$error = null;
        
        if (!empty($_POST)) { // si l'utilisateur a posté le formulaire

            $validation = true;
            
            if (empty($_POST['user_first_name'])
            	|| empty($_POST['user_name'])
            	|| empty($_POST['user_pseudo']) 
            	|| empty($_POST['user_email']) 
            	|| empty($_POST['user_password']) 
            	|| empty($_POST['user_confirmpass']))

            {
                $validation = false;
                $error = "Un ou plusieurs champs son vide"; // présence d'un champ vide
            }

            if (strlen($_POST['user_first_name']) > 50 
            	|| strlen($_POST['user_name']) > 50 
            	|| strlen($_POST['user_pseudo']) > 255 
            	|| strlen($_POST['user_email']) > 100 
            	|| strlen($_POST['user_password']) > 100)
            {
                $validation = false;
                $error = "Valeur erronée"; // valeur erronée d'un champ
            }

            if (($_POST['user_password'] !== $_POST['user_confirmpass'])) 
            {
                $validation = false;
                $error = "Vos mots de passe ne corresponde pas"; // mauvaise confirmation de mpd
            }

            if (!(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['user_email']))) 
            {
                $validation = false;
                $error = "Le format de l'email n'est pas valide"; // user_email non conforme
            }

            if ($validation) 
            {
             
                $userManager = new UserManager;

               if (empty($userManager->exists($_POST['user_pseudo']))) {

                    $hashedPassword = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

                    $user = new User([
                    	'user_first_name' => $_POST['user_first_name'],
                    	'user_name' => $_POST['user_name'],
                        'user_pseudo' => $_POST['user_pseudo'],
                        'user_password' => $hashedPassword,
                        'user_email' => $_POST['user_email']
                    ]);

                    $userManager->add($user);

                    header('Location: index.php?action=login');
                } else {
                    $error = "Le pseudo demandé est déja prit";
                }
            }
        }
	    require('view/frontend/inscription.php');
	}
}