<?php

class Admin
{

	private $admin_id
	private $admin_pseudo
	private $admin_password
	private $admin_date_creation

	public function __contruct(Array $data)
	{

		$this->hydrate($data)

	}

	public function hydrate($data)
	{
		if(isset($data['admin_id']))
			$this->groupAdmin_id($data['admin_id']);

		if(isset($data['admin_pseudo']))
			$this->groupAdmin_pseudo($data['admin_pseudo']);

		if(isset($data['admin_password']))
			$this->groupAdmin_password($data['admin_password']);

		if(isset($data['admin_date_creation']))
			$this->groupadmin_date_creation($data['admin_date_creation']);

	}

	public function returnAdmin_id()
	{

		return $this->admin_id;

	}

	public function returnAdmin_pseudo()
	{

		return $this->admin_pseudo;

	}

	public function returnAdmin_password()
	{

		return $this->admin_password;

	}

	public function returnAdmin_date_creation()
	{

		return $this->admin_date_creation;

	}

	// Voir

	public function groupAdmin_id()
	{
		$this->admin_id = $admin_id;
		return $this;

	}

	public function groupAdmin_pseudo()
	{

		$this->admin_pseudo = htmlspecialchars($admin_pseudo);
		return $this;

	}

	public function groupAdmin_password()
	{

		$this->admin_password = $admin_password;
		return $this;

	}

	public function groupAdmin_date_creation()
	{

		$this->admin_date_creation = $admin_date_creation;
		return $this;

	}
}