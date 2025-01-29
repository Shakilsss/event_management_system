<?php
require_once '../vendor/autoload.php';
use App\classes\AddEvent;

$events    = new AddEvent();
$getEvents = $events->addEvent($_POST);
if($getEvents == '' || empty($getEvents)){
    echo "false";
}else{
    echo "true";
}
?>
