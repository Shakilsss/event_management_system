<?php
namespace App\classes;
require_once 'Db_connection.php';
class RegisterAttendee {
    private $db;
    public function __construct() {
        $dbConnection = new Db_connection();
        $this->db = $dbConnection->getConnection();
    }

    public function registerAttendee($event_id,$user_name, $user_email, $user_phone) {
        $query = "SELECT capacity FROM event_details WHERE id = $event_id";
        $result = $this->db->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['capacity'] > 0) {
                $query = "INSERT INTO attendees (event_id,user_name, user_email, user_phone)  VALUES ('$event_id', '$user_name', '$user_email', '$user_phone')";
                $insertAttendee = $this->db->query($query);
                if ($insertAttendee) {
                    $query = "UPDATE event_details SET `registered_attendees` = `registered_attendees` + 1 WHERE id = $event_id";
                    $updateCapacity = $this->db->query($query);
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
       
    }   

}