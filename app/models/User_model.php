<?php

class User_model
{
	private $table = 'account';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getUserById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE accountID=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function userCount($data)
	{
		$this->db->query('SELECT * FROM account WHERE username=:username AND password=:password');
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getUserByUsernameAndPassword($data)
	{
		$this->db->query('SELECT * FROM account WHERE username=:username AND password=:password');
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);

		$this->db->execute();

		return $this->db->single();
	}

	public function userLogin($data)
	{
		$this->db->query('SELECT * FROM account WHERE username=:username AND password=:password');
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);

		$this->db->execute();

		return $this->db->single();
	}

	public function userRegister($data)
	{
		$query = "INSERT INTO account (username, password, exp) VALUES (:username, :password, 0)";
		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteUser($id)
	{
		$query = "DELETE FROM account WHERE accountID = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function editUser($data)
	{
		$query = "UPDATE account SET username=:username, password=:password WHERE accountID=:id";
		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);
		$this->db->bind('id', $data['id']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function addExp($exp)
	{
		$data = $this->getUserById($_SESSION["id"]);
		$query = "UPDATE account SET exp=:exp WHERE accountID=:id";
		$this->db->query($query);
		$this->db->bind('exp', $data['exp'] + $exp);
		$this->db->bind('id', $data['accountID']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getExp($id)
	{
		$this->db->query('SELECT exp FROM account WHERE accountID=:id');
		$this->db->bind('id', $id);

		$this->db->execute();
		return $this->db->single();
	}
}
