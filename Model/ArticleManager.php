<?php

class ArticleManager extends Manager
{

    public function __construct()
    {

        $this->dbConnect();

    }

	public function get($id)
	{

		$query = $this->dbConnect()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS creation_date FROM article WHERE id = ?');

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

    public function add(Article $article) // oblige à recevoir un objet Article en paramètre
    {
        $query = $this->dbConnect()->prepare('INSERT INTO article(title, content, date_creation, date_update) 
            VALUES(?, ?, NOW(), NOW())');
        $query->execute([

            $article->getTitle(),
            $article->getArticle()

        ]);
    }

    public function update(Article $article)
    {
        $query = $this->dbConnect()->prepare('UPDATE article SET title = :title, content = :content, date_update = NOW() 
            WHERE id = :id') or die(print_r($this->dbConnect()->errorInfo()));
        $query->execute([

            ':title' => $article->getTitle(),
            ':content' => $article->getArticle(),
            ':id' => $article->getId()

        ]);
    }

    public function delete(Article $article)
    {

        $query = $this->dbConnect()->prepare('DELETE FROM article WHERE id = ?');
        $result = $query->execute([

            $article->getId()

        ]);
    }
}
