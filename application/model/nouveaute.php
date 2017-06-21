<?php

class Nouveaute extends Db_object
{
    public $id;
    public $image;
    public $titre;
    public $date;
    public $slider_id;
    public $description;

    public $upload_directory = "public/img/nouveautes";
    public $tmp_path;

    protected static $db_table = "nouveaute"; 
    protected static $db_table_fields = array("image", "titre", "description", "date", "slider_id");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    public function set_file($file) {
        
        //first we check if a file is uploaded (if the super_global $_FILES isnt empty)
        if (empty($file) || !$file || !is_array($file)) {

            $this->errors[] = "There was no file uploaded here";
            return false;

        //if it's not empty we check if there is no error while uploading it (for that we check the error field of the $_FILES[])
        }elseif ($file['error'] != 0) {

            //If there is an error, we collect it inside our custom error array
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;

        }else {

            //If there is no error we collect all the properties of the file in our object properties (by using the $_FILES fields)

            //basename return the name of a file when given the complete path of the file. (see dash for exemples)
            $this->image = basename($file['name']); 
            $this->tmp_path = $file['tmp_name'];

        }

    }    

    public function save_nouveaute_and_image() {

        if(!empty($this->errors)) return false;

        if(empty($this->image) || empty($this->tmp_path)) {
            $this->errors[] = "the file was not available";
            return false;
        }

        $target_path = URL . $this->upload_directory;

        
        $target_path_file = ROOT . $this->upload_directory . '/' . $this->image;
        // $target_path_file = "/Applications/MAMP/htdocs/egghome/public/img/" . $this->photo ;

        if (file_exists($target_path_file)) {
            $this->errors[] = "the file {$this->image} already exists";
            if ($this->create()) {
                unset($this->tmp_path);
                return true;
            }
            return true;
        }

        if(move_uploaded_file($this->tmp_path, $target_path_file)){

            if ($this->create()) {
                unset($this->tmp_path);
                return true;
            }

        }else 
            $this->errors[] = "the folder probably does not allow permission to write.. moving unsuccessful";
    }

    public function get_last_nouveautes($limit, $slider_id) {
        $sql = "SELECT * 
                FROM nouveaute nouv 
                WHERE slider_id = {$slider_id}
                LIMIT {$limit} 
            ";

        $result = self::find_by_query($sql);
        return $result;
    }
}
