<?php
namespace App\classes;
class Db_connection {
    private $host = 'localhost';
    private $db_name = 'event_management';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Get the database connection
    public function getConnection() {
        $this->conn = null;
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        if (mysqli_connect_errno()) {
            echo "Connection error: " . mysqli_connect_error();
        }
        return $this->conn;
    }
}
?>