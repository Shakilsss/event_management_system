<?php
namespace App\classes;
require_once 'Db_connection.php';
class UserRegistration {

 public function __construct() {
        $dbConnection = new Db_connection();
        $this->db = $dbConnection->getConnection();
    }

    public function addUser(){
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO users(`user_name`, `user_email`, `user_password`) 
                  VALUES ('$user_name', '$user_email', '$user_password')";
        if ($this->db->query($query)) {
            return true;
        } else {
            return false;
        }
    }
public function getUser($user_id){
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = $this->db->query($query);
    $user = $result->fetch_assoc();
    return $user;

}

}