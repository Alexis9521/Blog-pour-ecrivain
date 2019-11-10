<?php

class BackendController extends Manager
{

    /*
    Méthod pour tester le niveau de l'utilisateur si inférieur à 2 redirige vers la page home
    */
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

        $articleManager = new ArticleManager(); 
        // création de l'Article Manager pour centraliser toutes les requêtes
        $commentManager = new CommentManager(); 
        // création du Comment Manager pour centraliser toutes les requêtes

        // Méthod pour supprimer un article
        if (!empty($_GET['article']) && $_GET['event'] == 'delete')
        {
            $article = new Article([

                'id' => $_GET['article']

            ]);

            $articleManager->delete($article);
        }
        // Méthod pour valider ou supprime un commentaire 
        if (!empty($_GET['comment']) && !empty($_GET['event']))
        {

            if ($_GET['event'] == 'accept')
            {

                $comment = new Comments([

                    'id' => $_GET['comment']

                ]);

                $commentManager->accept($comment);
            }

            if ($_GET['event'] == 'delete')
            {

                $comment = new Comments([

                    'id' => $_GET['comment']

                ]);

                $commentManager->delete($comment);
            }
        }
        // récupère les articles et leurs options, du plus récent au plus daté
        $articles = $articleManager->getArticle();
        // retourne une valeur true s'il y a des commentaires signalés
        $reported = $commentManager->getReported();
        // récupère les commentaires et leurs options, du plus récent au plus daté, en faisant une jointure pour récupérer le titre de l'article associé
        $comments = $commentManager->getAll();

        require('View/Backend/admin.php');
    }

    public function newArticle()
    {

    	$this->levelUser();

    	$error = null;

        if (!empty($_POST)) // on rentre dans la condition si POST n'est pas vide
        {
            $validation = true;

            if (empty($_POST['title']) && empty($_POST['text'])) {
                $error = "Veuillez remplir les champs";
                $validation = false;
            }
            if (strlen($_POST['title']) > 255) {
                $error = "Votre titre est trop long";
                $validation = false;
            }
            if ($validation) // si pas d'erreurs
            {
                // crée l'objet Article et ses valeurs
                $article = new Article([

                    'title' => $_POST['title'],
                    'content' => $_POST['text']

                ]);

                // instanciation de la classe ArticleManager, qui lance la connexion à la BDD
                $articleManager = new ArticleManager();

                $articleManager->add($article); // ajout de l'article à la BDD

                // redirection vers la page d'administration
                header('Location: index.php?action=admin&success=newArticle');
            }
            
        }
        
        require('View/Backend/createarticle.php');
    }

    public function updateArticle()
    {

        $this->levelUser();

        $articleManager = new ArticleManager(); 
        // création de l'Article Manager pour centraliser toutes les requêtes

        $error = null;

        if (!empty($_POST)) { // si l'utilisateur a posté

            $validation = true;

            if (empty($_POST['title']) && empty($_POST['text'])) {

                $validation = false;
                $error = "Formulaire vide";

            }
            if (strlen($_POST['title']) > 255) {

                $validation = false;
                $error = "Titre trop long";
            }

            if ($validation) {
                // crée l'Objet article et ses valeurs
                $articleUpdate = new Article([

                    'id' => $_GET['id'],
                    'title' => $_POST['title'],
                    'content' => $_POST['text'],

                ]);

                $articleManager->update($articleUpdate); 
                // lancement de la requête update
                // redirection vers la page d'administration
                header('Location: index.php?action=admin&success=updateArticle');
            }
        }
        $article = $articleManager->get($_GET['id']); 
        // on récupére l'article sous forme d'objet
        require('View/Backend/updateArticle.php');
    }
}