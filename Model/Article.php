<?php

class Article {

	private $id
	private $title
	private $pseudo
	private $article
	private $creation_date

	public function __contruct(Array $data)
	{

		$this->hydrate($data);

	}
	public function hydrate($data)
	{
		if(isset($data['id']))
			$this->groupId($data['id']);

		if(isset($data['title']))
			$this->groupTitle($data['title']);

		if(isset($data['pseudo']))
			$this->groupPseudo($data['pseudo']);

		if(isset($data['article']))
			$this->groupArticle($data['article']);

		if(isset($data['creation_date']))
			$this->groupCreation_date($data['creation_date']);

	}

	public function returnId()
	{

		return $this->id;

	}

	public function returnTitle()
	{

		return $this->title;

	}

	public function returnPseudo()
	{

		return $this->pseudo;

	}

	public function returnArticle()
	{

		return $this->article;

	}

	public function returnCreation_date()
	{

		return $this->creation_date;

	}

	// Voir

	public function groupId()
	{
		$this->id = $id;
		return $this;

	}

	public function groupTitle()
	{

		$this->title = htmlspecialchars($title);
		return $this;

	}

	public function groupPseudo()
	{

		$this->pseudo = htmlspecialchars($pseudo);
		return $this;

	}

	public function groupArticle()
	{

		$this->article = htmlspecialchars($article);
		return $this;

	}

	public function groupCreation_date()
	{

		$this->creation_date = $creation_date
		return $this;

	}
}