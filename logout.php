<?php
include_once ('config.php');
session_start();
if(isset($_SESSION)){
    unset($_SESSION);
    session_destroy();
   
}
 header ('location: index.html');
die();



?>