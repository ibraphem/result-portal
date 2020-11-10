<?php
include_once('configg.php');
include_once('config.php');
session_start();

$admission_no = $_POST['admission_no'];
$password = $_POST['password'];

 $select_qry = "SELECT * FROM student WHERE exam_no = '$admission_no' AND password = '$password'"; 
 //echo $select_qry; die;
 
 $result = mysqli_query($connect, $select_qry);


while ($row = mysqli_fetch_array($result)) {
if(mysqli_num_rows($result) == 1) {
     $_SESSION['exam_no'] = $row['exam_no'];
     $_SESSION['name'] = $row['name'];
                        
    
    $res = array(0=>1);
   echo $myJSON = json_encode($res);
   
    
} 

}

if(mysqli_num_rows($result) == 0) {

    $res = array(0=>0);
  echo $myJSON = json_encode($res);

    
}




?>