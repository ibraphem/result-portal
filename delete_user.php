<?php
include_once('configg.php');
session_start();

if(1 == 1) {
    
    $output = '';  
    $message = ''; 


if($_POST['users_id'] != "") {   
    
    $query = "DELETE FROM users WHERE id = '".$_POST["users_id"]."'";
    //echo $query;
    $result = mysqli_query($connect, $query);
    $message = "Record Deleted";
    } 
    if ($result) {
       // echo "Bosssss"; die;
        
        $output .= '<label class="text-success">' . $message . '</label>'; 
        
        $sel_qry = "SELECT * FROM users ORDER BY id DESC";
        $exp_res = mysqli_query($connect, $sel_qry);
        
        ?>
        
        
   <html>
   <head>
   
   </head>
   <body>

            
               <table class="table" id="student_table">  
            <thead class=" text-primary">
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>USERNAME NO</th>
                       <!--     <th>PASSWORD</th> -->
                            <th>ACTIONS &nbsp; <button type='button' name='add' id='add' data-toggle='modal' data-target='#add_data_Modal' class='btn btn-info btn-sm'>+ Add</button></th>

                      </thead>
  <?php  while($row = mysqli_fetch_array($exp_res)) { 
    // echo $message; 
  ?>
        
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
