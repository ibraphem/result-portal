<?php
include_once('configg.php');
session_start();

if(isset($_POST['blocker_id'])) {
    
    $query = "SELECT * FROM student where id = '".$_POST["blocker_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

?>