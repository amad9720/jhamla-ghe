<?php

class Database {

	public $connection; 

	function __construct() {

		$this->open_db_connection();

	}

	function open_db_connection() {

		// set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        try {

	        // generate a database connection, using the PDO connector
	        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
	        $this->connection = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
            
        } catch (PDOException $e) {
            die("database connection failed" . $this->connection->errorInfo());
        }

	}

	/**
	 * This function allow us to send a query
	 * @param  [String] $sql [description]
	 * @return [PDOstatement]      
	 */
	public function query($sql) {

        $query = $this->connection->prepare($sql);
        $result = $query->execute();

		$this->confirm_query($result);
		return $query;
	}

	/**
	 * this function allow us to check if a query is send without error, if not we kill the script
	 * @param  [Boolean] $result [description]
	 */
	private function confirm_query($result) { 

		if (!$result) die("Query failed with error : " . $this->connection->errorInfo());
	}

	/**
	 * Return the index of the last inserted element
	 * @return [String] [the last inserted index]
	 */
	public function the_insert_id() {

		//Returns the auto generated id used in the latest query
		return $this->connection->lastInsertId();
	}

}
