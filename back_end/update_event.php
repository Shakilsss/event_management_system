<?php
require_once '../vendor/autoload.php';
use App\classes\Events;

$events    = new Events();
$updateEvent = $events->updateEvent($_POST['id']);
if($updateEvent){
    echo "true";
}else{
    echo "false";
}
?>
