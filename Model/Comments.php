<?php 


class Comments
{

	private $id;
	private $article_id;
	private $content;
	private $report;

	public function __construct(Array $data)
	{

		$this->hydrate($data);

	}

	public function hydrata($data)
	{

		if(isset($data['id']))
			$this->setId($data['id']);

		if(isset($data['article_id']))
			$this->setArticle_id($data['article_id']);

		if(isset($data['content']))
			$this->setContent($data['content']);

		if(isset($data['report']))
			$this->setReport($data['report']);

	}

}


