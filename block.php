<?php
//error_reporting("on");
include_once('configg.php');
session_start();

if(!empty($_POST))  {
    //echo "cool";
    $output = '';  
    $message = '';  

    $todo_id = $_POST['todo_id'];
    $completed_at = date("Y-m-d");
    $active = $_POST['active'];
    $block = "Blocked";
       
    
    
    if($_POST['active'] == "Active") {
    //echo $_POST['customer_id'];
    $query = "UPDATE student
                SET activate = '$block'
                WHERE id = '$todo_id'";
                $message = "Well Done";
                
               // echo $query; die;
    //$result = mysqli_query($connect, $query);
    //echo $query;
    }
    $result= mysqli_query($connect, $query);
    
           if ($result) {
                //echo 'yes'; die;
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
            <td><h5><a href="#" style="color: red; "class="blocker" id="<?php echo $row['id']; ?>" ><?php echo $row['activate']; ?></a></h5></td>
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