<?php
require_once '../vendor/autoload.php';
use App\classes\Events;

$events    = new Events();
$getEventById = $events->getEventById($_POST['id']);
if($getEventById){
    echo json_encode($getEventById);
}else{
    echo "false";
}
?>
