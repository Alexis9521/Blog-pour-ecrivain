<?php

class User
{

	private $user_id
	private $user_first_name
	private $user_name
	private $user_pseudo
	private $user_email
	private $user_password
	private $user_date_creation


	public function __contruct(Array $data)
	{

		$this->hydrate($data)

	}

	public function hydrate($data)
	{
		if(isset($data['user_id']))
			$this->groupUser_id($data['user_id']);

		if(isset($data['user_first_name']))
			$this->groupUser_first_name($data['user_first_name']);

		if(isset($data['user_name']))
			$this->groupUser_name($data['user_name']);

		if(isset($data['user_pseudo']))
			$this->groupUser_pseudo($data['user_pseudo']);

		if(isset($data['user_email']))
			$this->groupUser_email($data['user_email']);

		if(isset($data['user_password']))
			$this->groupUser_password($data['user_password']);

		if(isset($data['user_date_creatoin']))
			$this->groupUser_date_creation($data['user_date_creation']);

	}

	public function returnUser_id()
	{

		return $this->user_id;

	}

	public function returnUser_first_name()
	{

		return $this->user_first_name;

	}

	public function returnUser_name()
	{

		return $this->user_name;

	}

	public function returnUser_pseudo()
	{

		return $this->user_pseudo;

	}

	public function returnUser_email()
	{

		return $this->user_email;

	}

	public function returnUser_password()
	{

		return $this->user_password;

	}

	public function returnUser_date_creation()
	{

		return $this->user_date_creation;

	}


	// Voir

	public function groupUser_id()
	{
		$this->user_id = $user_id;
		return $this;

	}

	public function groupUser_first_name()
	{

		$this->user_first_name = htmlspecialchars($user_first_name);
		return $this;

	}

	public function groupUser_name()
	{

		$this->user_name = htmlspecialchars($user_name);
		return $this;

	}

	public function groupUser_pseudo()
	{

		$this->user_pseudo = htmlspecialchars($user_pseudo);
		return $this;

	}

	public function groupUser_email()
	{

		$this->user_email = htmlspecialchars($user_email)
		return $this;

	}

	public function groupUser_password()
	{

		$this->user_password = $user_password;
		return $this;

	}

	public function groupUser_date_creation()
	{

		$this->user_date_creation = $user_date_creation
		return $this;

	}
}