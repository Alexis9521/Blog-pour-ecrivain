<?php

class Article {

	private $id;
	private $title;
	private $content;
	private $creation_date;


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

		if(isset($data['content']))
			$this->setContent($data['content']);

		if(isset($data['creation_date']))
			$this->setCreation_date($data['creation_date']);

	}

	// GETTER
	
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

	public function getcontent()
	{

		return $this->content;

	}

	public function getCreation_date()
	{

		return $this->creation_date;

	}

	// SETTER

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

	public function setContent($content)
	{

		$this->content = $content;

	}

	public function setCreation_date($creation_date)
	{

		$this->creation_date = $creation_date;

	}
}