<?php
require_once '../vendor/autoload.php';
use App\classes\Events;

$events    = new Events();
$getEvents = $events->addEvent($_POST);
if($getEvents == '' || empty($getEvents)){
    echo "false";
}else{
    echo "true";
}
?>
