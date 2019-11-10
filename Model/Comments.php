<?php 


class Comments
{

	private $id;
	private $article_id;
	private $comment;
	private $report;
	private $date_comment;
	private $pseudo; // Le pseudo du compte de l'utilisateur qui à posté le message


	public function __construct(Array $data)
	{

		$this->hydrate($data);

	}

	public function hydrate($data)
	{

		if(isset($data['id']))
			$this->setId($data['id']);

		if(isset($data['article_id']))
			$this->setArticle_id($data['article_id']);

		if(isset($data['comment']))
			$this->setComment($data['comment']);

		if(isset($data['report']))
			$this->setReport($data['report']);

		if(isset($data['comment_date']))
			$this->setComment_date($data['comment_date']);

		if(isset($data['pseudo']))
			$this->setPseudo($data['pseudo']);

	}

	// GETTER

	public function getId()
	{

		return $this->id;

	}

	public function getArticle_id()
	{

		return $this->article_id;

	}

	public function getComment()
	{

		return $this->comment;

	}

	public function getReport()
	{

		return $this->report;

	}

	public function getComment_date()
	{

		return $this->comment_date;

	}

	public function getPseudo()
	{

		return $this->pseudo;

	}

	// SETTER

	public function setId($id)
	{

		$this->id = $id;

	}

	public function setArticle_id($article_id)
	{

		$this->article_id = $article_id;

	}

	public function setComment($comment)
	{

		$this->comment = htmlspecialchars($comment);

	}

	public function setReport($report)
	{

		$this->report = $report;

	}

	public function setComment_date($comment_date)
	{

		$this->comment_date = $comment_date;

	}

	public function setPseudo($pseudo)
	{

		$this->pseudo = htmlspecialchars($pseudo);

	}

}


