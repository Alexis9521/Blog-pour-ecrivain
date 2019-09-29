<?php

class UserManager extends Manager
{

	public function __contruct()
	{

		$this->dbConnect();

	}

	public function add(User $user)
	{

	$send->$this->db->prepare('INSERT INTO user(user_first_name, user_name, user_pseudo, user_email, user_password, user_date_creation) 
		VALUES(:user_first_name, :user_name, :user_pseudo, :user_email, :user_password, CURDATE()) ');
	
	$send->execute([
		
		'user_first_name' => $user->groupUser_first_name(),
		'user_name' => $user->groupUser_name(),
		'user_pseudo' => $user->groupUser_pseudo(),
		'user_email' => $user->groupUser_email(),
		'user_password' => $user->groupUser_password()

	]);


	}



	
}