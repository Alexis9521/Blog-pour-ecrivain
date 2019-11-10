<?php

class CommentManager extends Manager
{
    
    public function __construct()
    {

        $this->dbConnect(); // Connexion à la bdd

    }


    public function getReported()
    {
        $report = false;

        $query = $this->dbConnect()->query('SELECT * FROM comments 
        	WHERE report = 1');

        $queryReport = $query->fetch(PDO::FETCH_ASSOC);
        if ($queryReport)
        {

            $report = true;

        }

        return $report;
    }

    /* 
    Récupère tous les commentaires
    */
    public function getAll()
    {
        // retourne la liste de tous les commmentaires, et l'article relié
        $comments = [];

        $query = $this->dbConnect()->query('SELECT comments.id, article_id , pseudo, comment, comment_date, report
        FROM comments
        INNER JOIN article ON comments.article_id = article.id
        INNER JOIN user ON comments.pseudo = user.user_pseudo
        ORDER BY report DESC, comment_date DESC');

        while ($data = $query->fetch(PDO::FETCH_ASSOC))
        {

            $comments[] = new Comments($data);

        }

        return $comments;

    }
    /*
    Affichage des commentaires poster par rapport à son article
    */
    public function getPosted($article_id)
    {
        // retourne la liste des commentaires publiés sous forme de tableau d'objets
        $comments = [];

        $query = $this->dbConnect()->prepare('SELECT id, article_id , pseudo, comment, comment_date , report 
        	FROM comments 
        	WHERE article_id = ? 
        	ORDER BY report, comment_date 
        	DESC');

        $query->execute([

            $article_id

        ]);

        while ($data = $query->fetch(PDO::FETCH_ASSOC))
        {

            $comments[] = new Comments($data);

        }

        return $comments;

    }

    /*
    Ajout d'un commentaire
    */
    public function add(Comments $comment)
    {

    	$query = $this->dbConnect()->prepare("INSERT INTO comments(article_id, pseudo, comment, comment_date, report) 
    		VALUES(:article_id, :pseudo, :comment, NOW(), 0)");

	        $query->execute([

	            'article_id' => $comment->getArticle_id(),
	            'pseudo' => $comment->getPseudo(),
	            'comment' => $comment->getComment()

	        ]);
	}
    /*
    Accepte un commentaire signalé
    */
    public function accept(Comments $comment)
    {

        $query = $this->dbConnect()->prepare("UPDATE comments 
        	SET report = 0 
        	WHERE id = ?");

        $result = $query->execute([

            $comment->getId()

        ]);
    }

    /*
    Method pour le report d'un commentaire
    */
    public function report(Comments $comment)
    {

        $query = $this->dbConnect()->prepare("UPDATE comments
         SET report = 1 
         WHERE id = ?");

        $query->execute([

            $comment->getId()

        ]);
    }

    /*
    Method pour la supression d'un commentaire 
    */
    public function delete(Comments $comment)
    {

        $query = $this->dbConnect()->prepare("DELETE FROM comments 
        	WHERE id = ?");

        $result = $query->execute([

            $comment->getId()

        ]);
    }
}