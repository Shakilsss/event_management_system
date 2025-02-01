<?php
require_once '../vendor/autoload.php';
use App\classes\Events;

$events    = new Events();
$deleteEvent = $events->deleteEvent($_POST['id']);
if($deleteEvent){
    echo "true";
}else{
    echo "false";
}
?>
