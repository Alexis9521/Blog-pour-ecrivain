<?php

class AdminManager extends Manager 
{
	public function __construct()
	{

		$this->dbConnect();

	}

	public function get($admin_pseudo)
    {

        $query = $this->dbConnect()->prepare('SELECT admin_id, admin_pseudo, admin_password, admin_role FROM admin WHERE admin_pseudo = ?');

        $query->execute([
            $admin_pseudo
        ]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if (!$data) 
        {
            return false;
        }
        else
        {
            return new Admin($data);
        }
    }
}