<?php
error_reporting(0);
include "../src/functions/database.php";
$token = $_POST['token'];
switch ($token) {
    case 'delete_slider':
        # code...
        delete_slider();
        break;

    case 'delete_event':
        delete_event();
        break;

    case 'delete_news':
        delete_news();
        break;

    case 'delete_partner':
        delete_partner();
        break;

    case 'delete_minpet_doc':
        delete_minpet_doc();
        break;

    case 'delete_publication':
        delete_publication();
        break;

    case 'delete_archive':
        delete_archive();
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

function delete_event(){
    global $database;
    $id = $_POST['id'];

    $sql = "DELETE FROM events WHERE id = '$id'";
    $result = $database->query($sql);
    if($result){
        echo "Deleted";
    }else{
        echo "Try Again, There is an issue with your network";
    }

}

function delete_news(){
    global $database;
    $id = $_POST['id'];

    $sql = "DELETE FROM news WHERE id = '$id'";
    $result = $database->query($sql);
    if($result){
        echo "Deleted";
    }else{
        echo "Try Again, There is an issue with your network";
    }

}

function delete_partner(){
    global $database;
    $id = $_POST['id'];

    $sql = "DELETE FROM partners WHERE id = '$id'";
    $result = $database->query($sql);
    if($result){
        echo "Deleted";
    }else{
        echo "Try Again, There is an issue with your network";
    }
}

function delete_minpet_doc(){
    global $database;
    $id = $_POST['id'];

    $sql = "DELETE FROM min_pet WHERE id = '$id'";
    $result = $database->query($sql);
    if($result){
        echo "Deleted";
    }else{
        echo "Try Again, There is an issue with your network";
    }
}

function delete_publication(){
    global $database;
    $id = $_POST['id'];

    $sql = "DELETE FROM publications WHERE id = '$id'";
    $result = $database->query($sql);
    if($result){
        echo "Deleted";
    }else{
        echo "Try Again, There is an issue with your network";
    }
}

function delete_archive(){
    global $database;
    $id = $_POST['id'];

    $sql = "DELETE FROM archives WHERE id = '$id'";
    $result = $database->query($sql);
    if($result){
        echo "Deleted";
    }else{
        echo "Try Again, There is an issue with your network";
    }
}
?>