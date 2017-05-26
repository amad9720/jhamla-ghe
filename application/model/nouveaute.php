<?php

class Nouveaute extends Db_object
{
    public $id;
    public $image;
    public $titre;
    public $filename;
    public $description;

    protected static $db_table = "nouveaute"; 
    protected static $db_table_fields = array("id", "image", "titre", "description", "date");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    /**
     * This method Handle All the uploaded files (images) and help managing it in the database 
     * @param [String] $file [the name of the file to be saved, it's the super_global $_FILES]
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
            $this->filename = basename($file['name']); 
            $this->tmp_path = $file['tmp_name'];

        }

    }

    public function picture_path() {

        return $this->upload_directory.'/'.$this->filename;

    }

    /**
     * This method here will update or create a new file in the db depending on if its already present in the db or not.
     * @return [Boolean] Return true if updated or created... false if not 
     */
    public function save_image() {

        //if the file already exist in the db, update it
        if ($this->id){

            $this->update();
            return true;
        }

        else 
            //if there are some errors related to the file
            if(!empty($this->errors)) return false;

            //if there is no file or directory
            if(empty($this->filename) || empty($this->tmp_path)) {
                $this->errors[] = "the file was not available";
                return false;
            }

            //the target path to the upload_file_directory ("images")
            $target_path = URL . '/' . $this->upload_directory . '/' ;

            //If there is no errors in the uploading process, we collect the entire path where the file will move after (because remenber, the uploaded file is in a tmp_dir when just uploaded)the uploaded file in the upload directory (exp : /Applications/MAMP/htdocs/photoGallery/admin/filename)
            $target_path_file = URL . '/' . $this->upload_directory . '/' . $this->filename;

            //then we check if there is already a file with the same name in this uploading directory. if it's true we display it as an error
            if (file_exists($target_path_file)) {
                $this->errors[] = "the file {$this->filename} already exists";
                return false;
            }

            //if the file dont exist in the final directory (it's unique), we move it then a this moment from it's actual location (tmp_path) to the upload_ditectory
            if(move_uploaded_file($this->tmp_path, $target_path_file)){

                //after the file is moved to the upload_directory, we create a record of it t=in the db.
                if ($this->create()) {

                    unset($this->tmp_path);
                    return true;

                }
            }
            //if the record was not created (maybe because of permission on the directory)
            else 
                $this->errors[] = "the folder probably does not allow permission to write.. moving unsuccessful";

    }


    /**
     * this method will delete the file from the db (the table) and then delete it from the server  (our images folder...)
     * @return [Boolean] [True if the image was deleted and false if not]
     */
    public function delete_photo() {
        //if the file was deleted from the db, delete it from the server too
        if ($this->delete()) {

            $target_path_file = URL . '/' . $this->picture_path();

            //the unlinke method delete the file which the path is given as parameter
            return unlink($target_path_file)? true : false;

        } else {
        //if not deleted from the db, then return false;
            return false;
        }
        
    }

    public function get_last_nouveautes($limit) {
        $sql = "SELECT * FROM nouveaute LIMIT ".$limit;
        $result = self::find_by_query($sql);
        return $result;
    }
}
