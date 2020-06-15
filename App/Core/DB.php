<?php
	
	require_once DB . 'MysqliDb.php';

class DB
{
	protected $db;

	public function connect()
	{
		$database = new MysqliDb(HOST, USERNAME, PASSWORD, DBNAME);

		if (!$database->connect()) {
			
			$this->db = $database;

			return $this->db;

		} else {

			echo "Error To Connect DataBase";

		}
	}
}