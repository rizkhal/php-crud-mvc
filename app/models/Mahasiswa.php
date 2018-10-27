<?php

class Mahasiswa {

	private $db;
	private $table = 'mahasiswa';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAll()
	{
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
	}

	public function store($name, $email)
	{
		$this->db->query("INSERT INTO {$this->table} (name, email) VALUES (:name, :email)");
		
		$this->db->bind(':name', $name);
		$this->db->bind(':email', $email);

		return $this->db->execute();
	}

	public function edit($id)
	{
		$this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
		return $this->db->single();
	}

	public function update($id, $name, $email)
	{
		$this->db->query("UPDATE {$this->table} SET name = :name, email = :email WHERE id = {$id}");

		$this->db->bind(':name', $name);
		$this->db->bind(':email', $email);

		return $this->db->execute();
	}

	public function destroy($id)
	{
		$this->db->query("DELETE FROM {$this->table} WHERE id = {$id}");
		return $this->db->execute();
	}

}