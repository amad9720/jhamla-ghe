<?php

class TypeCapteur extends Db_object
{
    public $id;
    public $type;

    protected static $db_table = "type_capteurs"; 
    protected static $db_table_fields = array("id", "type");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {
        
    }

    public function add_type_capteurs() {
        if (empty($this->id))
            return $this->create();
        else return false;
    }

    public function remove_type_capteurs() {
        if (!empty($this->id))
            return $this->delete();
    }

    public static function get_all_capteurs()
    {
        $result = self::find_all();
        return $result;
    }


}
