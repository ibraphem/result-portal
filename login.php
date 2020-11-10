<?php
include_once('configg.php');
include_once('config.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

 $select_qry = "SELECT * FROM users WHERE username = '$username' AND password = '$password'"; 
 //echo $select_qry; die;
 
 $result = mysqli_query($connect, $select_qry);


while ($row = mysqli_fetch_array($result)) {
if(mysqli_num_rows($result) == 1) {
     $_SESSION['user'] = $row['username'];

                        
    
    $res = array(0=>1);
   echo $myJSON = json_encode($res);
   
    
} 

}

if(mysqli_num_rows($result) == 0) {

    $res = array(0=>0);
  echo $myJSON = json_encode($res);

    
}


//echo $_REQUEST['username']; die();
/* $select_qry = "SELECT * FROM users WHERE username = '{$_REQUEST['username']}' AND password = '{$_REQUEST['password']}'";
 
 $result = mysqli_query($connect, $select_qry);  
 


 if($result){
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['username'] == "{$_REQUEST['username']}" && $row['password'] == "{$_REQUEST['password']}") {
                        $_SESSION['user'] = $row['username'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['role'] = $row['role'];
                        //$_SESSION['role'] = $row['role'];
                        //echo $_SESSION['role']; die;
                        
                         
                        $res = array(0=>1 , 1 => "Login successful..Redirecting in 10 sec");
                        echo $myJSON = json_encode($res);
                        die();
                    }
                }
       
        
            }  
            
    
    
            
 if(mysqli_fetch_array($result)== false){
    
    $res = array(0=>false , 1 => "Invalid Username or Password");
    echo $myJSON = json_encode($res);
    die();

    }           
    


        
     
 

/*if($_REQUEST['username'] == "ibraphem" && $_REQUEST['password'] == "me")  {
    
    //echo  "Ajax is here";
    
    $res = array(0=>1 , 1 => "Login successful..Redirecting in 10 sec");
    echo $myJSON = json_encode($res);
    die();
} else {
    
  $res = array(0=>false , 1 => "Invalid Username or Password");
  echo $myJSON = json_encode($res);
  die();
}*/



?>