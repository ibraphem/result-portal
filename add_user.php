        
   <html>
   <head>
   
   </head>
   <body>


<?php
error_reporting("on");
include_once('configg.php');
session_start();


if(!empty($_POST))  {
    
    $output = '';  
    $message = '';  
    
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $user_id = mysqli_real_escape_string($connect, $_POST['user_id']);  
    
    if($_POST['user_id'] == "") {
        
        $qry_sel = "SELECT * FROM users WHERE username = '$username'";
        $res = mysqli_query($connect, $qry_sel);
        
       if(mysqli_num_rows($res) > 0) {
        echo "<span style='color:red'><b>You have already added this user</b></span>";
        
        
        $sel_qry = "SELECT * FROM users ORDER BY id DESC";
        $exp_res = mysqli_query($connect, $sel_qry);
         ?>
         
           <table class='table table-hover' id='student_table'>  
            <thead class=" text-primary">
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>USERNAME</th>
                        <!--    <th>PASSWORD</th> -->
                            <th>ACTIONS &nbsp; <button type='button' name='add' id='add' data-toggle='modal' data-target='#add_data_Modal' class='btn btn-info btn-sm'>+ Add</button></th>

                      </thead>
  <?php  while($row = mysqli_fetch_array($exp_res)) { ?>
    
 
        
        <tr>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['username'] ?></td>
    <!--        <td><?php //echo $row['password'] ?></td> -->
            <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm edit_data" />
        <input type="button" name="delete" value="X" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm delete_data" /></td>
        </tr>
        
      
        
        
  <?php  } ?>
        </table>
        
        
    <?php   } else {
            
            $query = "  
           INSERT INTO users(name, email, username, password)  
           VALUES('$name', '$email', '$username', '$password');  
           ";  
           $message = 'Record Inserted';
            
            }
        
        
        
                

        
    } else {
    
    
   // echo $_POST['user_id']; die;
    $query = "UPDATE users
                SET name = '$name',
                    email = '$email',
                    username = '$username',
                    password = '$password'
                WHERE id = '$user_id'";
                
               // echo $query; die;
                $message = "Record updated";
                
                }
   // $result = mysqli_query($connect, $query);
    //echo $query;
    
    //$result= mysqli_query($db_class->connect(), $query);
  /*  else {
        
        $query = "  
           INSERT INTO student(date, name, exam_no, activate)  
           VALUES('$date', '$name', '$admission_no', '$activate');  
           ";  
           $message = 'Record Inserted';
    } */
    
    if (mysqli_query($connect, $query)) {
        $output .= '<label class="text-success">' . $message . '</label>'; 
        
        $sel_qry = "SELECT * FROM users ORDER BY id DESC";
        $exp_res = mysqli_query($connect, $sel_qry);
        
        ?>


            
               <table class='table table-hover' id='student_table'>  
            <thead class=" text-primary">
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>USERNAME</th>
                            <th>PASSWORD</th>
                            <th>ACTIONS &nbsp; <button type='button' name='add' id='add' data-toggle='modal' data-target='#add_data_Modal' class='btn btn-info btn-sm'>+ Add</button></th>

                      </thead>
  <?php  while($row = mysqli_fetch_array($exp_res)) { ?>
    
 
        
        <tr>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm edit_data" />
        <input type="button" name="delete" value="X" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm delete_data" /></td>
        </tr>
        
      
        
        
  <?php  } ?>
        </table>
  </body>   
  </html>
  
  <?php
     }    
}
?>
