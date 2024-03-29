<?php

class UserManager extends Manager
{

	public function __construct()
	{

		$this->dbConnect(); // Connexion à la bdd

	}

    /* 
    Récupère les utilisateurs 
    */

	public function get($user_pseudo)
    {

        $query = $this->dbConnect()->prepare('SELECT user_id, user_pseudo, user_password, user_role FROM user WHERE user_pseudo = ?');

        $query->execute([
            $user_pseudo
        ]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if (!$data) 
        {
            return false;
        }
        else
        {
            return new User($data);
        }
    }

    /*
    Method pour vérifier si un pseudo existe déjà
    */

	public function exists($user_pseudo)
    {
        $query = $this->dbConnect()->prepare('SELECT user_pseudo FROM user WHERE LOWER(user_pseudo) = ?');
        $query->execute([
            strtolower($user_pseudo)
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /*
    Ajout d'un nouvel utilisateur
    */

	public function add(User $user)
	{

		$query = $this->dbConnect()->prepare('INSERT INTO user(user_first_name, user_name, user_pseudo, user_email, user_password, user_role, user_date_creation)
			VALUES(:user_first_name, :user_name, :user_pseudo, :user_email, :user_password, :user_role, NOW())');

		$query->execute([

			'user_first_name' => $user->getUser_first_name(),
			'user_name' => $user->getUser_name(),
			'user_pseudo' => $user->getUser_pseudo(),
			'user_email' => $user->getUser_email(),
			'user_password' => $user->getUser_password(),
			'user_role' => 1
			
		]);
	}
}

