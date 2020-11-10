<?php
include_once('configg.php');
session_start();

if(1 == 1) {
    
    $output = '';  
    $message = ''; 


if($_POST['users_id'] != "") {   
    
    $query = "DELETE FROM student WHERE id = '".$_POST["users_id"]."'";
    //echo $query;
    $result = mysqli_query($connect, $query);
    $message = "Record Deleted";
    } 
    if ($result) {
       // echo "Bosssss"; die;
        
        $output .= '<label class="text-success">' . $message . '</label>'; 
        
        $sel_qry = "SELECT * FROM student ORDER BY id DESC";
        $exp_res = mysqli_query($connect, $sel_qry);
        
        ?>
        
        
   <html>
   <head>
   
   </head>
   <body>

            
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
            <td><h5><a href="#" style="color: red;" class="blocker" id="<?php echo $row['id']; ?>" ><?php echo $row['activate']; ?></a></h5></td>
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
