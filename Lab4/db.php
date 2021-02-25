<?php
include_once 'util.php';
class DBConnector{
	protected $pdo;

	//The database connection happens in the class constructor

	function __construct(){

		//The data source name (dsn) contains the dialect i.e. target DBMS name, host and the database name

		$dsn = "mysql:host=".Util::$SERVER_NAME.";dbname=".Util::$DB_NAME."";
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
					PDO::ATTR_EMULATE_PREPARES => false,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
		try{

			//The PDO database handle is then created by instantiating the PDO class

			$this->pdo = new PDO($dsn, Util::$DB_USER, Util::$DB_USER_PASS, $options);

		}catch(PDOException $e)
		{
			echo $e->getMessage();			
		}
	}

	public function connectToDb(){
		return $this->pdo;
	}

	public function closeDB(){
		$this->pdo = null;
	}

}

?>