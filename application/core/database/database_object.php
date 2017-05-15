<?php 

class Db_object {

	public $errors = array(); //for feedback to us or our customers
	public $upload_errors_array = array(

		// UPLOAD_ERR_OK => "There is no error, the file uploaded with success.",
	 //    UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
	 //    UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
	 //    UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
	 //    UPLOAD_ERR_NO_FILE => "No file was uploaded.",
	 //    UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder. Introduced in PHP 5.0.3.",
	 //    UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk. Introduced in PHP 5.1.0.",
	 //    UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
	);

	public $tmp_path;
    public $upload_directory = "img";



	/**
	 * Basically, in many methods, we will write a query and return the result of the sent query in a $result variable...
	 * It is better to declare it static so that we will not need to instanciate it anytime just in order to find records
	 * @return [PDOStatement] return the object constructed from the query
	 */
	static public function find_all() { 

		return static::find_by_query("SELECT * FROM " . static::$db_table . " ");	
	}


	static public function find_by_id($id) { 

		//if you want to fetch one result, use the LIMIT 1 command to be sure of fetching just one result
		// $record is not an object, it's an array of objects (here just one)
		 $record = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");

		//if the array returned is not empty, we return the fist value of the array...if it's empty we return the variable $record itsel
		return  $record = (!empty($record)) ? array_shift($record) :  $record ;	
				
	}

	//this method here allow us to handle a repetitf action... it will avoid us to repeat lines and lines of code
	//return NULL if nothing is found... So we have to take this matter... 
	static public function find_by_query($sql) {
		
		//Here we return an array of objects, each of them has all the columns of one of our db rows as it's properties
		return static::instanciate($sql);
	}


	/**
	 * this function will automate the instanciation of a $record object for us and assign the values fetched from rows to the the object properties...
	 * @return [Array]      [return an Array of PDOStatement Object]
	 */
	static public function instanciate($sql) {
		global $database;

		//we have to create the array so that it's not undefined when the while loop is not entered
		$object_array = array();

		$calling_class = get_called_class();


		$result_set = $database->query($sql);
		
		while ($row = $result_set->fetchObject($calling_class))
			$object_array[] = $row;


		return $object_array;
		
	}


	/**
	 * this method will return an array that holds all the properties of the class when its represente a specific table.
	 * Because the get_object_vars() function is inside the class (it has the $this as argument), it will return all the properties 
	 * of the class inside an array... even these we dont need ($id or $db_table for exemple)
	 * So this is a problem for us .... that means we can't use the get_object_vars() method here (let's comment it);
	 * @return an array with the properties inside the db.
	 */
	
	protected function properties() {		
		$properties = array();

		foreach (static::$db_table_fields as $db_field) {
			if (property_exists($this, $db_field)) {
				$properties[$db_field] = $this->$db_field;
			}
		}

		return $properties;
	}

	/**
	 * Create or Update a $record depending on if he already exists or not
	 * This way the app is more clever and we dont take unecessary actions
	 * @return [type] [description]
	 */
	public function save() {
		isset($this->id) ? $this->update() : $this->create();
	}


	public function create() {
		global $database;

		//array for the abstaction
		//we fetch all the colums and value of the table in one array
		$properties = $this->properties();

		//Abstract the properties and their values
		//we use the imploade function to extract the keys inside our array (we get the keys with the array_keys(array) function in the second argument) separated by "," (first argument). so this function retuen a string with all the keys separated by comma (key1,key2,key3,key4...)
		$sql = "INSERT INTO " . static::$db_table . " ( " . implode(',', array_keys($properties)) . " )
				VALUES ('" . implode("','", array_values($properties)) . "' ) 
		";
		//--> VALUES(' key1 ',' key2 ',' key3 ',' key4 ',' key5 ',' key6 ')
		
		if ($database->query($sql)) {
			$this->id = $database->connection->lastInsertId();
			return true;
		} else
			return false;
		
	}

	public function update() {
		global $database;

		$properties = $this->properties();
		$properties_pairs = array();

		foreach ($properties as $key => $value) {
			$properties_pairs[] = " {$key} = '{$value}' ";
		}
		$sql = "UPDATE " . static::$db_table . " SET " . 
		implode(", ",$properties_pairs) . " 
		WHERE id = '{$this->id}'
		";

		$query = $database->query($sql);

		return ($query->rowCount() == 1) ? true : false;
		
	}

	public function delete() {
		global $database;

		$sql = "DELETE FROM " . static::$db_table . "
				WHERE id = '{$this->id}'
				LIMIT 1
		";

		$query = $database->query($sql);

		return ($query->rowCount() == 1) ? true : false;
		
	}

	/**
	 * This method Handle All the uploaded files (images) and help managing it in the database 
	 * @param [String] $file [the name of the file to be saved]
	 * @return [Boolean] [true if the file was saved, false if not]
	 */
	public function set_file($file) {

		//first we check if a file is uploaded (if the super_global $_FILES isnt empty)
		if (empty($file) || !$file || !is_array($file)) {

			$this->errors[] = "There was no file uploaded here";
			return false;

		//if it's not empty we check if there is no error while uploading it (for that we check the error field of the $_FILES[])
		}elseif ($file['error'] != 0) {

			//If there is an error, we collect it inside our custom error array
			$this->errors[] = $upload_errors_array($file['error']);
			return false;

		}else {

			//If there is no error we collect all the properties of the file in our object properties (by using the $_FILES fields)

			//basename return the name of a file when given the complete path of the file. (see dash for exemples)
			$this->user_image = basename($file['name']); 
			$this->tmp_path = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size'];

		}

	}
}