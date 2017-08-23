<?php
include "src/functions/database.php";
$token = $_POST['token'];
switch ($token) {
    case 'delete_slider':
        # code...
        delete_slider();
        break;
    
    default:
        # code...
        break;
}
function delete_slider(){
    global $database;
    $id = $_POST['id'];

    $sql = "DELETE FROM sliders WHERE id = '$id'";
    $result = $database->query($sql);
    if($result){
        echo "Deleted";
    }else{
        echo "Try Again, There is an issue with your network";
    }
}
?>