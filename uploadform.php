<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Animated Dynamic Form</title>
<!--	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
-->
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
 <link href="assets/css/material-dashboard.css" rel="stylesheet" /> 
  <!-- CSS Files -->

<link href="css/formstyle.css" rel="stylesheet"/>
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/formscript.js"></script>

<style>
    
/*    label{
    padding: 10px;
    background: white; 
    display: table;
    color: #000;
    border-radius: 15px;
   
     }

*/

input[type="file"] {
    
    border-bottom-left-radius: 15px;
    border-top-left-radius: 15px;
}



</style>
</head>

<!-- Coded With Love By Mutiullah Samim-->
<body>

<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo text-center">
      <a href="dashboard.php">
        <img src="img/logo.png" alt="logo" style="width: 250px; height: 100px;" />
      </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="users.php">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="student.php">
              <i class="material-icons">bubble_chart</i>
              <p>Students</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="student.php">
              <i class="material-icons">content_paste</i>
              <p>Results</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="studentlogin.htm">
              <i class="material-icons">language</i>
              <p>Portal</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">library_books</i>
              <p>Tasks</p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="logout.php">
              <i class="material-icons">unarchive</i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
	<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
				<h4>Result Upload</h4>
			</div>
			<div class="card-body">
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<div id="dynamic_container">
						<div class="input-group mt-3">
						<!--	<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
							</div> -->
							<select  name="session" class="form-control" id="session" required>
                                         <option value=""> --Select Session-- </option> 
                                        <?php for($i=2016; $i<= date("Y"); $i++)  { $j= $i+1; ?>
                                        
                                        <option value=" <?= "$i/$j"; ?>"> <?= "$i/$j"; ?> </option>
                                        
                                        <?php } ?>
                                      
                                        
                                        </select>
						</div>
						<div class="input-group mt-3">
						<!--	<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-phone-square"></i></span>
							</div> -->
							<select  name="term"  class="form-control" id="term" required >
                                      <option value=""> --Select Term-- </option>
                                      <option value="First Term">First Term</option>
                                      <option value="Second Term">Second Term</option>
                                      <option value="Third Term">Third Term</option>
                                     </select>
						</div>
                        <div class="input-group mt-3">
						<!--	<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-phone-square"></i></span>
							</div> -->
							<select  name="classes"  class="form-control"  id="classes" required>
                                      <option value=""> --Select Class-- </option>
                                      <option value="JSS1">JSS1</option>
                                      <option value="JSS2">JSS2</option>
                                      <option value="JSS3">JSS3</option>
                                     </select>
						</div>
                        <div class="input-group mt-3">
						<!--	<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-phone-square"></i></span>
							</div> -->
							<select  name="arm"  class="form-control"  id="arm" required>
                                      <option value=""> --Select Class Arm-- </option>
                                      <option value="A">A</option>
                                      <option value="B">B</option>
                                      <option value="C">C</option>
                                      <option value="D">D</option>
                                     </select>
						</div>
                      <!--  Choose files:
                           <input required="required" type="file" name="files[]" id="File" class="form-control" multiple>
                            <input type="submit" name="submit" value="UPLOAD">-->
                       
                        <div class="input-group mt-3">
							
                                <input required="required" type="file" name="files[]" id="File" class="form-control" multiple>
                                
			<!--			</div>
   
	               <input type="submit" name="submit" value="UPLOAD" class="btn btn-primary btn-sm float-right submit_btn"/>						
				
                    </div> -->
                    
                    <div class="input-group mt-3">
	               <input type="submit" name="submit" value="UPLOAD RESULT" class="btn btn-primary btn-xs float-right submit_btn"/>						
				    </div>
				</form>
			
		</div>
	</div>
	</div>
 </div>
</div>
</div>
</body>
</html>