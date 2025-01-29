<?php
namespace App\classes;
require_once 'Db_connection.php';
class GetEvents {
    public function __construct() {
        $dbConnection = new Db_connection();
        $this->db = $dbConnection->getConnection();
    }


    public function getEvents() {
        $query = "SELECT * FROM event_details";
        $result = $this->db->query($query);
        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
        return $events;
    }




}


?>