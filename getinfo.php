<?php
if(isset($_POST['page'])){
    //Include pagination class file
    include('pagination.php');
    session_start();
    //Include database configuration file
    include('config.php');
    include('configg.php');
    
    $start = !empty($_POST['page'])?$_POST['page']:0;
    $limit = 7;
    
    //set conditions for search
    $whereSQL = $orderSQL = '';
    $keywords = $_POST['keywords'];
    $sortBy = $_POST['sortBy'];
    if(!empty($keywords)){
        $whereSQL = "WHERE name LIKE '%".$keywords."%' or email LIKE '%".$keywords."%' or username LIKE '%".$keywords."%' or password LIKE '%".$keywords."%'";
    }
    if(!empty($sortBy)){
        $orderSQL = " ORDER BY id ".$sortBy;
    }else{
        $orderSQL = " ORDER BY id DESC ";
    }

//echo $whereSQL; die;
    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as postNum FROM users ".$whereSQL.$orderSQL);
    //echo $queryNum; die;
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['postNum'];

    //initialize pagination class
    $pagConfig = array(
        'currentPage' => $start,
        'totalRows' => $rowCount,
        'perPage' => $limit,
        'link_func' => 'searchFilter'
    );
    $pagination =  new Pagination($pagConfig);  ?>
    
        <div id="posts_content">
      <div class="table-responsive posts_list">
        <table class="table" id="student_table">
          <thead class=" text-primary">
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>USERNAME NO</th>
                            <th>PASSWORD</th>
                            <th>ACTIONS &nbsp; <button type='button' name='add' id='add' data-toggle='modal' data-target='#add_data_Modal' class='btn btn-info btn-sm'>+ Add</button></th>

                      </thead>
          <tbody>

<?php
     $result = mysqli_query($connect,"SELECT * FROM `users` $whereSQL $orderSQL LIMIT $start,$limit");
     if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){ ?>
        
        <tr>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm edit_data" />
        <input type="button" name="delete" value="X" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm delete_data" /></td>
        </tr>
  <?php   } ?>
        </tbody>
                    </table>
                  </div>
        <?php echo $pagination->createLinks(); } ?>
                  </div>
      <?php    } ?>            