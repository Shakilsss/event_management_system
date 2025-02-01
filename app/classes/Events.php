<?php
namespace App\classes;
require_once 'Db_connection.php';
class Events {
    private $db;
    public function __construct() {
        $dbConnection = new Db_connection();
        $this->db = $dbConnection->getConnection();
    }
    
    public function addEvent() {
        session_start();
        $event_name = $_POST['event_name'];
        $description= $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date   = $_POST['end_date'];
        $location   = $_POST['location'];
        $organizer  = $_POST['organizer'];
        $capacity   = $_POST['capacity'];
        
        // Check if an image is uploaded
        if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] == 0) {

            $image = $_FILES['event_image']['name'];
            $target_dir = "images/event_images/";
            $target_file = $target_dir . basename($image);
            move_uploaded_file($_FILES['event_image']['tmp_name'], $target_file);
        } else {
            $image = null;
        }
        // echo "<pre>"; print_r($_POST);exit;

        $query = "INSERT INTO event_details(`event_name`, `description`, `start_date`, `end_date`, `location`, `organizer`, `capacity`, `event_image`) 
            VALUES ('$event_name', '$description', '$start_date', '$end_date', '$location', '$organizer', '$capacity', '$image')";
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

    public function getEvents() {
        $query = "SELECT * FROM event_details";
        $result = $this->db->query($query);
        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
        return $events;
    }


    public function getEventById($id) {
        $query = "SELECT * FROM event_details WHERE id = '$id'";
        $result = $this->db->query($query);
        $event = $result->fetch_assoc();
        // echo "<pre>"; print_r($event);exit;
        return $event;
    }

    public function updateEvent($id) {
        // echo "<pre>";print_r($_POST);exit;
        $event_name = $_POST['event_name'];
        $description= $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date   = $_POST['end_date'];
        $location   = $_POST['location'];
        $organizer  = $_POST['organizer'];
        $capacity   = $_POST['capacity'];
        $query = "UPDATE event_details SET `event_name`='$event_name', `description`='$description', `start_date`='$start_date', `end_date`='$end_date', `location`='$location', `organizer`='$organizer', `capacity`='$capacity',  WHERE event_id = '$id'";
        if ($this->db->query($query)) {
            return true;
        } else {
            return false;
        }   
        }


  public function deleteEvent($id) {
        $query = "DELETE FROM event_details WHERE id = '$id'";
        if ($this->db->query($query)) {
            return true;
        } else {
            return false;
        }
    }
        
}
?>