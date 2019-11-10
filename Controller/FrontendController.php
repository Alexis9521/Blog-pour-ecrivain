<?php

class FrontendController
{

	public function home()
	{

		require('View/Frontend/home.php');

	}

	public function admin()
	{

		require('View/Frontend/admin.php');

	}
	/*
	Récuperation et affichages des articles
	*/
	public function article()
    {

    	$articleManager = new ArticleManager();

    	$article = $articleManager->getArticle();

        require('View/Frontend/article.php');
    }

    public function viewArticle()
    {

    	$articleManager = new ArticleManager(); 
    	// création de l'Article Manager pour centraliser toutes les requêtes
    	$commentManager = new CommentManager();

    	if (!empty($_GET['comment']) && !empty($_GET['article']) && $_GET['event'] == 'report') {

            $comment = new Comments([

                'id' => $_GET['comment']

            ]);

            $commentManager->report($comment);

            header('Location: index.php?action=viewarticle&id=' . $_GET['article'] . '#comments');
            exit();
        }
       	// si l'utilisateur a posté un commentaire
        if (!empty($_POST)) {

            $validation = true;

            if (empty($_POST['comments'])) {

                $validation = false;

            }

            // si les champs sont remplis et conformes
            if ($validation) {

                $comment = new Comments([

                    'article_id' => $_GET['id'],
                    'pseudo' =>  $_SESSION['pseudo'],
                    'comment' => $_POST['comments']

                ]);

                $commentManager->add($comment);
            }

            header('Location: index.php?action=viewarticle&id=' . $_GET['id'] . '#comments');
        }
	    

    	$article = $articleManager->exists($_GET['id']);

    	if(!$article)
    	{

    		header('Location: index.php?action=error.php');
    		exit();

    	}
    	else
    	{

        	$article = $articleManager->get($_GET['id']);

        }

        $comments = $commentManager->getPosted($_GET['id']);

    require('View/Frontend/viewarticle.php');

    }

	public function account()
	{

		require('View/Frontend/account.php');

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
                $error = "Un ou plusieurs champs son vide"; 
                // présence d'un champ vide
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
                $error = "Vos mots de passe ne corresponde pas"; 
                // mauvaise confirmation de mpd
            }

            if (!(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['user_email']))) 
            {
                $validation = false;
                $error = "Le format de l'email n'est pas valide"; 
                // user_email non conforme
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

	    require('View/Frontend/inscription.php');

	}

	public function login()
	{

		$error = null;

		if(!empty($_POST))
		{

			$validation = true;


			if(empty($_POST['pseudo']) || empty($_POST['password']))
			{

				$validation = false;
				$error = " Un ou plusieurs champs son vide ";

			}

			if(strlen($_POST['pseudo']) > 100 || strlen($_POST['password']) > 100) 
			{
				
				$validation = false;
				$error = "Valeur erronée";

			}

			if($validation)// Méthod connexion pour l'utilisateur
			{

				$userManager = new UserManager;
				$user = $userManager->get($_POST['pseudo']);

				if(!$user)

					$error = "Vos identifiants ne corresponde pas";

				else
				{

					$passwordVerif = password_verify($_POST['password'], $user->getUser_password());

					if ($passwordVerif) 
					{
					
						$_SESSION['id'] = $user->getUser_id();
						$_SESSION['role'] = $user->getUser_role();
						$_SESSION['pseudo'] = $user->getUser_pseudo();

						header('Location: index.php?action=home');

					}
					else
						$error = "Vos identifiants ne corresponde pas";
				}
			}
			if($validation)// Méthod connexion admin
			{

				$adminManager = new AdminManager;
				$admin = $adminManager->get($_POST['pseudo']);

				if(!$admin)

					$error = "Vos identifiants ne corresponde pas";

				else
				{

					$passwordVerif = password_verify($_POST['password'], $admin->getAdmin_password());

					if($passwordVerif)
					{

						$_SESSION['id'] = $admin->getAdmin_id();
						$_SESSION['role'] = $admin->getAdmin_role();
						$_SESSION['pseudo'] = $admin->getAdmin_pseudo();

						header('Location: index.php?action=home');

					}
					else
						$error = "Vos identifiants ne corresponde pas";
				}
			}						
		}

		require("View/Frontend/connexion.php");
	}

	public function logout()
	{

		session_destroy();
		header('Location: index.php?action=home');

	}

	public function error()
	{

		require("View/Frontend/error.php");

	}
}