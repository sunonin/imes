<?php

class Connection
{
	public $hostname 		= 'localhost';
	public $dbUser	 		= 'u972732750_root';
	public $dbPassword 		= 'cicsimis.COM2022';
	public $dbName			= 'u972732750_imes';

	public function connect() {
		try {
			$conn = new PDO('mysql:host='.$this->hostname .';dbname='.$this->dbName ,$this->dbUser, $this->dbPassword);

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conn;
		} catch (\Exception $e) {
			echo "Database Error ". $e->getMessage();
		}
	}
}