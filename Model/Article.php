<?php

class Article {

	private $id;
	private $title;
	private $article;
	private $creation_date;
	private $reported;

	public function __construct(Array $data)
	{

		$this->hydrate($data);

	}
	public function hydrate($data)
	{
		if(isset($data['id']))
			$this->setId($data['id']);

		if(isset($data['title']))
			$this->setTitle($data['title']);

		if(isset($data['pseudo']))
			$this->setPseudo($data['pseudo']);

		if(isset($data['article']))
			$this->setArticle($data['article']);

		if(isset($data['creation_date']))
			$this->setCreation_date($data['creation_date']);

	}

	public function getId()
	{

		return $this->id;

	}

	public function getTitle()
	{

		return $this->title;

	}

	public function getPseudo()
	{

		return $this->pseudo;

	}

	public function getArticle()
	{

		return $this->article;

	}

	public function getCreation_date()
	{

		return $this->creation_date;

	}

	// Voir

	public function setId($id)
	{

		$this->id = $id;

	}

	public function setTitle($title)
	{

		$this->title = htmlspecialchars($title);

	}

	public function setPseudo($pseudo)
	{

		$this->pseudo = htmlspecialchars($pseudo);

	}

	public function setArticle($article)
	{

		$this->article = htmlspecialchars($article);

	}

	public function setCreation_date($creation_date)
	{

		$this->creation_date = $creation_date;

	}
}