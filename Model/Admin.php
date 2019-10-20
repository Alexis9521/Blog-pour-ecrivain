<?php

class Admin
{

	private $admin_id;
	private $admin_pseudo;
	private $admin_password;
	private $admin_date_creation;
	private $admin_role;

	public function __construct(Array $data)
	{

		$this->hydrate($data);

	}

	public function hydrate($data)
	{
		if(isset($data['admin_id']))
			$this->setAdmin_id($data['admin_id']);

		if(isset($data['admin_pseudo']))
			$this->setAdmin_pseudo($data['admin_pseudo']);

		if(isset($data['admin_password']))
			$this->setAdmin_password($data['admin_password']);

		if(isset($data['admin_date_creation']))
			$this->setAdmin_date_creation($data['admin_date_creation']);

		if(isset($data['admin_role']))
			$this->setAdmin_role($data['admin_role']);

	}

	public function getAdmin_id()
	{

		return $this->admin_id;

	}

	public function getAdmin_pseudo()
	{

		return $this->admin_pseudo;

	}

	public function getAdmin_password()
	{

		return $this->admin_password;

	}

	public function getAdmin_date_creation()
	{

		return $this->admin_date_creation;

	}

	public function getAdmin_role()
	{

		return $this->admin_role;

	}

	// Voir

	public function setAdmin_id($admin_id)
	{
		$this->admin_id = $admin_id;


	}

	public function setAdmin_pseudo($admin_pseudo)
	{

		$this->admin_pseudo = htmlspecialchars($admin_pseudo);

	}

	public function setAdmin_password($admin_password)
	{

		$this->admin_password = $admin_password;

	}

	public function setAdmin_date_creation($admin_date_creation)
	{

		$this->admin_date_creation = $admin_date_creation;

	}

	public function setAdmin_role($admin_role)
	{

		$this->admin_role = $admin_role;

	}
}