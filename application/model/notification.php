<?php

class Notification extends Db_object
{
    public $id;
    public $id_client;
    public $titre;
    public $contenu;

    protected static $db_table = "notification"; 
    protected static $db_table_fields = array("id", "id_client", "titre", "contenu");


    /**
     * @param object $db A PDO database connection
     */
    function __construct()
    {

    }

    public static function find_all_notifications()
    {

        $notifications = Notification::find_all();

        foreach ($notifications as $notification) {
            $notification->client = $notification->find_client()->client;

            return $notifications;
        }
    }

    public function find_client() {
        $sql = "SELECT *
                FROM utilisateur
                WHERE utilisateur.id = '{$this->id_client}'
                LIMIT 1 ";
        $result = self::find_by_query($sql);
        return array_shift($result);
    }

    public function send_notification($id_client, $titre, $contenu) {
        if (empty($this->id)) {

            $this->id_piece = $id_client;
            $this->titre = $titre;
            $this->contenu = $contenu;

            return $this->create();
        }
        else return false;
    }

    public function receive_notification() {

    }
}