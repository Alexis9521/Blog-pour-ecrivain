<?php

require_once('Model/Manager.php');

class ArticleManager extends Manager
{
	public function viewArticle()
	{

		$db = $this->dbConnect();
		$article = $db->query('SELECT id, pseudo, title, article, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM article ORDER BY creation_date DESC LIMIT 0, 5');
		return $article;

	}

}

