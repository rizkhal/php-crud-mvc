<?php

class Database {

	private $host 	= DB_HOST;
	private $user 	= DB_USER;
	private $pass 	= DB_PASS;
	private $dbase 	= DB_NAME;

	private $dbh;
	private $stmt;

	public function __construct()
	{
		/**
		 * [$dsn = database source name]
		 * @var string
		 */
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbase;

		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE 	 => PDO::ERRMODE_EXCEPTION
		];

		/**
		 * Connection to database
		 */
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} catch (PDOException $e) {
			print_r($e->getMessage());
			die;
		}
	}

	/**
	 * RUN QUERY
	 * 
	 */

	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	/**
	 * BIND PARAM
	 * 
	 */

	public function bind($param, $value, $type = null)
	{
		if(is_null($type)){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
					
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;

				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;

				default:
					$type = PDO::PARAM_STR;
			}
		}

		return $this->stmt->bindParam($param, $value, $type);
	}

	/**
	 * Execute PDO
	 * 
	 */

	public function execute()
	{
		$this->stmt->execute();
	}

	/**
	 * GET ALL
	 * 
	 */

	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * GET SINGLE
	 * 
	 */

	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}



}