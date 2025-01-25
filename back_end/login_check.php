<?php
require_once '../vendor/autoload.php';
use App\classes\LoginProcess;

$login_check = new LoginProcess();
$login = $login_check->login($_POST['user_email'], $_POST['password']);

if ($login==true) {
    echo "true";
} else {
    echo "false";
}
?>
