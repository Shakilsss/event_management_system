<?php
namespace App\classes;
require_once 'Db_connection.php';
session_start();
class AddEvent {
    private $db;
    public function __construct() {
        $dbConnection = new Db_connection();
        $this->db = $dbConnection->getConnection();
    }

    public function addEvent() {
    $event_name = $_POST['event_name'];
    $description= $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date   = $_POST['end_date'];
    $location   = $_POST['location'];
    $organizer  = $_POST['organizer'];
    $capacity   = $_POST['capacity'];
    $is_free    = $_POST['is_free'];
    $price      = $_POST['price'];
    $query = "INSERT INTO event_details(`event_name`, `description`, `start_date`, `end_date`, `location`, `organizer`, `capacity`, `is_free`, `price`) 
              VALUES ('$event_name', '$description', '$start_date', '$end_date', '$location', '$organizer', '$capacity', '$is_free', '$price')";
    if ($this->db->query($query)) {
        $query = "INSERT INTO events (`user_id`, `event_id`) VALUES ('{$_SESSION['user_id']}', LAST_INSERT_ID())";
        if ($this->db->query($query)) {
            return true; 
        } else {
            return false;
        }   
    } else {
        return false;
    }
}
}
?>