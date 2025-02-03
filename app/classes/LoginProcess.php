<?php
namespace App\classes;
require_once 'Db_connection.php';
class LoginProcess {
    private $db;
    public function __construct() {
        $dbConnection = new Db_connection();
        $this->db = $dbConnection->getConnection();
    }

    public function login($user_email, $password) {
        // echo "<pre>"; print_r($user_email.'======'. $password);exit;
        $user_email = htmlspecialchars($user_email);
        $password = htmlspecialchars($password);

        $query = "SELECT * FROM users WHERE user_email = '" . $this->db->real_escape_string($user_email) . "'";
        $result = $this->db->query($query);
        $user = $result->fetch_assoc();
        // echo "<pre>"; print_r($user);exit;
        if ($user['user_status'] == 0) {
            return 'inactive';
        } elseif ($user['user_status'] == 1) {
            if ($user &&  password_verify($password, $user['user_password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['user_email'] = $user['user_email'];
                $_SESSION['user_phone'] = $user['user_phone'];
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