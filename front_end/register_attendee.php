<?php
require_once '../vendor/autoload.php';
use App\classes\RegisterAttendee;



// echo "<pre>"; print_r($_POST);exit;

$registerAttendee = new RegisterAttendee();
$register = $registerAttendee->registerAttendee($_POST['event_id'],$_POST['attendee_name'], $_POST['attendee_email'], $_POST['attendee_mobile']);

if ($register==true) {
    echo "true";
} else {
    echo "false";
}
?>
