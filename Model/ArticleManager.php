<?php

class ArticleManager extends Manager
{

    public function __construct()
    {

        $this->dbConnect(); // Connexion à la bdd

    }

    /*
    Récupère les articles 
    */
	public function get($id)
	{

		$query = $this->dbConnect()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM article WHERE id = ?');

        $query->execute([
            $id
        ]);

        $article = $query->fetch(PDO::FETCH_ASSOC);
        if(!$article)
        {
            return false;
        }
        else
        {
            return new Article($article);
        }
	}

    /*
    Vérifie que l'article existe
    */
    public function exists($id)
    {
        if (is_numeric($id))
        {
            $query = $this->dbConnect()->prepare('SELECT id FROM article WHERE id = ?');
            $query->execute([
                $id
            ]);
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        } 
    }

    /*
    Affiche les articles 
    */
    public function getArticle()
    {

        $article = [];

        $query = $this->dbConnect()->query('SELECT id, title, content, creation_date FROM article ORDER BY creation_date');

        while($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $article[] = new Article($data);
        }
        return $article;

    }

    /*
    Ajout d'un article
    */
    public function add(Article $article) 
    // oblige à recevoir un objet Article en paramètre
    {
        $query = $this->dbConnect()->prepare('INSERT INTO article(title, content, creation_date) 
            VALUES(?, ?, NOW())');
        $query->execute([

            $article->getTitle(),
            $article->getContent()

        ]);
    }

    /*
    Mise à jour d'un article
    */
    public function update(Article $article)
    {
        $query = $this->dbConnect()->prepare('UPDATE article SET title = :title, content = :content
            WHERE id = :id') or die(print_r($this->dbConnect()->errorInfo()));
        $query->execute([

            ':title' => $article->getTitle(),
            ':content' => $article->getContent(),
            ':id' => $article->getId()

        ]);
    }
    /*
    Supression d'un article
    */
    public function delete(Article $article)
    {

        $query = $this->dbConnect()->prepare('DELETE FROM article WHERE id = ?');
        $result = $query->execute([

            $article->getId()

        ]);  
    }
}
