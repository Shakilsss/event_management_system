<?php 

    public function __construct() {
        $dbConnection = new Db_connection();
        $this->db = $dbConnection->getConnection();
    }

    public function addUser(){
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
        $user_phone = $_POST['user_phone'];
        $user_gender = $_POST['user_gender'];
        $user_nid = $_POST['user_nid'];
        $user_address = $_POST['user_address'];
        $user_image = $_FILES['user_image']['name'];
        $image_tmp = $_FILES['user_image']['tmp_name'];
        $query = "INSERT INTO users(`user_name`, `user_email`, `user_password`, `user_phone`, `user_gender`, `user_nid`, `user_address`, `user_image`) 
                  VALUES ('$user_name', '$user_email', '$user_password', '$user_phone', '$user_gender', '$user_nid', '$user_address', '$user_image')";
        if ($this->db->query($query)) {
            move_uploaded_file($image_tmp, '../uploads/'.$user_image);
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
?>
