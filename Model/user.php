<?php

class User
{

	private $user_id;
	private $user_first_name;
	private $user_name;
	private $user_pseudo;
	private $user_email;
	private $user_password;
	private $user_date_creation;
	private $user_role;


	public function __construct(Array $data)
	{

		$this->hydrate($data);

	}

	public function hydrate($data)
	{
		if(isset($data['user_id']))
			$this->setUser_id($data['user_id']);
		

		if(isset($data['user_first_name']))
			$this->setUser_first_name($data['user_first_name']);
		

		if(isset($data['user_name']))
			$this->setUser_name($data['user_name']);
		

		if(isset($data['user_pseudo']))
			$this->setUser_pseudo($data['user_pseudo']);
		

		if(isset($data['user_email']))
			$this->setUser_email($data['user_email']);
		

		if(isset($data['user_password']))
			$this->setUser_password($data['user_password']);
		

		if(isset($data['user_date_creation']))
			$this->setUser_date_creation($data['user_date_creation']);
		

		if(isset($data['user_role'])) 
			$this->setUser_role($data['user_role']);
	
	}

	public function getUser_id()
	{

		return $this->user_id;

	}

	public function getUser_first_name()
	{

		return $this->user_first_name;

	}

	public function getUser_name()
	{

		return $this->user_name;

	}

	public function getUser_pseudo()
	{

		return $this->user_pseudo;

	}

	public function getUser_email()
	{

		return $this->user_email;

	}

	public function getUser_password()
	{

		return $this->user_password;

	}

	public function getUser_date_creation()
	{

		return $this->user_date_creation;

	}

	public function getUser_role()
	{

		return $this->user_role;

	}


	// Voir

	public function setUser_id($user_id)
	{
		$this->user_id = $user_id;

	}

	public function setUser_first_name($user_first_name)
	{

		$this->user_first_name = htmlspecialchars($user_first_name);


	}

	public function setUser_name($user_name)
	{

		$this->user_name = htmlspecialchars($user_name);

	}

	public function setUser_pseudo($user_pseudo)
	{

		$this->user_pseudo = htmlspecialchars($user_pseudo);

	}

	public function setUser_email($user_email)
	{

		$this->user_email = htmlspecialchars($user_email);

	}

	public function setUser_password($user_password)
	{

		$this->user_password = $user_password;


	}

	public function setUser_date_creation($user_date_creation)
	{

		$this->user_date_creation = $user_date_creation;

	}

	public function setUser_role($user_role)
	{

		$this->user_role = $user_role;

	}

}