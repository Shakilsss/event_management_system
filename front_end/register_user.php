<?php
require_once '../vendor/autoload.php';
use App\classes\UserRegistration;


// echo "<pre>"; print_r($_POST);exit;

$registerUser = new UserRegistration();
$register = $registerUser->addUser($_POST['name'], $_POST['email'], $_POST['password']);

if ($register==true) {
    echo "true";
} else {
    echo "false";
}
?>
