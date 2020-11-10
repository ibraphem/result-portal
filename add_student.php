        
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
    
    $date = date("Y-m-d");
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $admission_no = mysqli_real_escape_string($connect, $_POST['admission_no']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $activate = "Active";
    $user_id = mysqli_real_escape_string($connect, $_POST['user_id']);  
    
    
    if($_POST['user_id'] == "") {
        
        $qry_sel = "SELECT * FROM student WHERE exam_no = '$admission_no'";
        $res = mysqli_query($connect, $qry_sel);
        
       if(mysqli_num_rows($res) > 0) {
        echo "<span style='color:red'><b>You have already added this student</b></span>";
        
        
        $sel_qry = "SELECT * FROM student ORDER BY id DESC";
        $exp_res = mysqli_query($connect, $sel_qry);
         ?>
         
           <table class='table table-hover' style='width: 70%; margin-left: 17%;' id='student_table'>  
            <thead>
       
    <tr>
         
        <th>DATE</th>
        <th>NAME</th>
        <th>ADMISSION NO</th>
        <th>PASSWORD</th>
        <th>STATUS</th>
        <th>ACTIONS &nbsp; <button type='button' name='add' id='add' data-toggle='modal' data-target='#add_data_Modal' class='btn btn-info btn-sm'>+ Add</button></th>
    </tr>
    </thead>
  <?php  while($row = mysqli_fetch_array($exp_res)) { 
    // echo $message; 
  if($row['activate'] == "Active") { ?>
        
        <tr>
            <td><?php echo $row['date']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['exam_no'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><h5 style="color: blue;"><a href="#" class="tasking" id="<?php echo $row['id']; ?>" ><?php echo $row['activate']; ?></a></h5></td>
            <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm edit_data" />
        <input type="button" name="delete" value="X" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm delete_data" /></td>
        </tr>
        
        <?php  } else { ?>
        
        <tr>
            <td><?php echo $row['date']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['exam_no'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><h5 ><a href="#" class="blocker" style="color: red;" id="<?php echo $row['id']; ?>" ><?php echo $row['activate']; ?></a></h5></td>
            <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm edit_data" />
        <input type="button" name="delete" value="X" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm delete_data" /></td>
        </tr>
  <?php } } ?>
        </table>
        
        
    <?php   } else {
            
            $query = "  
           INSERT INTO student(date, name, exam_no, password, activate)  
           VALUES('$date', '$name', '$admission_no', '$password', '$activate');  
           ";  
           $message = 'Record Inserted';
            
            }
        
        
        
                

        
    } else {
    
    
   // echo $_POST['user_id']; die;
    $query = "UPDATE student
                SET name = '$name',
                    exam_no = '$admission_no',
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
        
        $sel_qry = "SELECT * FROM student ORDER BY id DESC";
        $exp_res = mysqli_query($connect, $sel_qry);
        
        ?>


            
               <table class='table table-hover' style='width: 70%; margin-left: 17%;' id='student_table'>     
           
  
    <thead>
       
    <tr>
         
        <th>DATE</th>
        <th>NAME</th>
        <th>ADMISSION NO</th>
        <th>PASSWORD</th>
        <th>STATUS</th>
        <th>ACTIONS &nbsp; <button type='button' name='add' id='add' data-toggle='modal' data-target='#add_data_Modal' class='btn btn-info btn-sm'>+ Add</button></th>
    </tr>
    </thead>
  <?php  while($row = mysqli_fetch_array($exp_res)) { 
    // echo $message; 
  if($row['activate'] == "Active") { ?>
        
        <tr>
            <td><?php echo $row['date']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['exam_no'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><h5 style="color: blue;"><a href="#" class="tasking" id="<?php echo $row['id']; ?>" ><?php echo $row['activate']; ?></a></h5></td>
            <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm edit_data" />
        <input type="button" name="delete" value="X" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm delete_data" /></td>
        </tr>
        
        <?php  } else { ?>
        
        <tr>
            <td><?php echo $row['date']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['exam_no'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><h5 ><a href="#" class="blocker" style="color: red;" id="<?php echo $row['id']; ?>" ><?php echo $row['activate']; ?></a></h5></td>
            <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm edit_data" />
        <input type="button" name="delete" value="X" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm delete_data" /></td>
        </tr>
  <?php } } ?>
        </table>
  </body>   
  </html>
  
  <?php
     }    
}
?>
