<?php
include_once("configg.php");
session_start();
if(isset($_SESSION['exam_no'])) {

?>


<!DOCTYPE html>
<html>
<head>
	<title>Maverick Result Checker</title>
<!--	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
-->
    <link rel="stylesheet" href="css/tablestyle.css"/>
  <link rel="apple-touch-icon" sizes="76x76" href="images/icons/echo.png"/>
  <link rel="icon" type="image/png" href="images/icons/echo.png"/>
<link href="css/formstyle.css" rel="stylesheet"/>
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/formscript.js"></script>


</head>

<!-- Coded With Love By Mutiullah Samim-->
<body>
	<div class="container h-100">
    
    <div class="table-title">
    <div>
    <h3 style="color: green; text-align: center; margin-top: 20px;">Welcome <?php echo $_SESSION['name']; ?></h3>
    </div>
    </div>
    
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
				<h4>RESULT PORTAL</h4>
			</div>
			<div class="card-body">
				<form action="download.php" method="post">
					<div id="dynamic_container">
                    <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-phone-square"></i></span>
							</div>
                            <input type="text" name="admission_no" id="admission_no" class="form-control" value="<?php echo $_SESSION['exam_no']; ?>" placeholder="Enter Admission number" required readonly="s"/>
				
						</div>
						<div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-user-graduate"></i></span>
							</div>
							<select  name="session" class="form-control" id="session" required>
                                         <option value=""> --Select Session-- </option> 
                                        <?php for($i=2016; $i<= date("Y"); $i++)  { $j= $i+1; ?>
                                        
                                        <option value=" <?= "$i/$j"; ?>"> <?= "$i/$j"; ?> </option>
                                        
                                        <?php } ?>
                                      
                                        
                                        </select>
						</div>
						<div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-phone-square"></i></span>
							</div>
							<select  name="term"  class="form-control" id="term" required >
                                      <option value=""> --Select Term-- </option>
                                      <option value="First Term">First Term</option>
                                      <option value="Second Term">Second Term</option>
                                      <option value="Third Term">Third Term</option>
                                     </select>
						</div>
                        <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-phone-square"></i></span>
							</div>
							<select  name="classes"  class="form-control"  id="classes" required>
                                      <option value=""> --Select Class-- </option>
                                      <option value="JSS1">JSS1</option>
                                      <option value="JSS2">JSS2</option>
                                      <option value="JSS3">JSS3</option>
                                     </select>
						</div>
                        <div class="input-group mt-3">
							<div class="input-group-prepend">
								<span class="input-group-text br-15"><i class="fas fa-phone-square"></i></span>
							</div>
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
	               <input type="submit" name="submit" value="Check Result" class="btn btn-info btn-xs float-right submit_btn"/>						
				    </div>
                    </div>
				</form>
			
		</div>
	</div>
	</div>
</body>
</html>
<?php

}
?>