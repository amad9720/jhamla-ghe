<?php

class Facture extends Db_object
{
    public $id;
    public $date;
    public $id_client;
    public $pdf;

    public $id_offre;

    protected static $db_table = "facture"; 
    protected static $db_table_fields = array("id", "date", "id_client", "pdf", "id_offre");

    public $tmp_path;
    public $upload_directory = "public/img/pdf";

    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }
    
    
    public static function show_facture($id_client){

        $sql = "SELECT * FROM facture WHERE id_client={$id_client}"; 
        $results = Facture::find_by_query($sql);
        return $results;
    }

    public function save_facture() {

        if(!empty($this->errors)) return false;

        if(empty($this->pdf) || empty($this->tmp_path)) {
            $this->errors[] = "the file was not available";
            return false;
        }

        $target_path = URL . $this->upload_directory;

        
        $target_path_file = ROOT . $this->upload_directory . '/' . $this->pdf;
        // $target_path_file = "/Applications/MAMP/htdocs/egghome/public/img/" . $this->photo ;

        if (file_exists($target_path_file)) {
            $this->errors[] = "the file {$this->pdf} already exists";
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


}
