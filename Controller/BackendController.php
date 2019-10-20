<?php

class BackendController extends Manager
{

	public function levelUser()
	{

		if($_SESSION['role'] < 2)
		{

			header('Location: index.php?action=home');
			exit();

		}
	}


	public function admin()
	{

		$this->levelUser();
        
		require('View/Frontend/admin.php');

	}

	public function addAdmin()
	{

		$this->levelUser();

		require_once('Model/Manager.php');

		$error = null;
        
        if (!empty($_POST)) { // si l'utilisateur a posté le formulaire

            $validation = true;
            
            if (empty($_POST['admin_pseudo']) 
            	|| empty($_POST['admin_email']) 
            	|| empty($_POST['admin_password']) 
            	|| empty($_POST['admin_confirmpass']))

            {
                $validation = false;
                $error = "Un ou plusieurs champs son vide"; // présence d'un champ vide
            }

            if (strlen($_POST['admin_pseudo']) > 255 
            	|| strlen($_POST['admin_email']) > 100 
            	|| strlen($_POST['admin_password']) > 100)
            {
                $validation = false;
                $error = "Valeur erronée"; // valeur erronée d'un champ
            }

            if (($_POST['admin_password'] !== $_POST['admin_confirmpass'])) 
            {
                $validation = false;
                $error = "Vos mots de passe ne corresponde pas"; // mauvaise confirmation de mpd
            }

            if (!(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['admin_email']))) 
            {
                $validation = false;
                $error = "Le format de l'email n'est pas valide"; // user_email non conforme
            }

            if ($validation) 
            {
             
                $adminManager = new AdminManager;

               if (empty($AdminManager->exists($_POST['admin_pseudo']))) {

                    $hashedPassword = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);

                    $user = new Admin([

                        'adminr_pseudo' => $_POST['admin_pseudo'],
                        'admin_password' => $hashedPassword,
                        'admin_email' => $_POST['admin_email']

                    ]);

                    $adminManager->add($admin);

                    header('Location: index.php?action=login');
                } else {
                    $error = "Le pseudo demandé est déja prit";
                }
            }
        }
	    require('view/frontend/inscription.php');
	}
}