<?php
include_once('configg.php');
session_start();

if(isset($_POST['users_id'])) {
    
    $query = "SELECT * FROM users where id = '".$_POST["users_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

?>