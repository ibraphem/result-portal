<?php
include_once("configg.php");
session_start();
if(isset($_SESSION['exam_no'])) {

?>

<html lang="en">
<head>
	<meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="images/icons/echo.png"/>
  <link rel="icon" type="image/png" href="images/icons/echo.png"/>    
	<title>Maverick Result Checker</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    
    <link rel="stylesheet" href="css/tablestyle.css"/>
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div class="table-title">
<!--<h3>Review your entries</h3>
<p>or contact the school management for help</p>  -->
</div>
<table class="table-fill">
<thead>


<?php

include_once('configg.php');

$admission_no = $_POST['admission_no'];
$session = $_POST['session'];
$term = $_POST['term'];
$classes =$_POST['classes'];
$arm = $_POST['arm'];

if(isset($_POST['submit'])) {
    
    $sel_qry = "SELECT * FROM images INNER JOIN student ON images.admission_no = student.exam_no 
                WHERE images.admission_no = '$admission_no' AND images.session = '$session' AND images.term = '$term' 
                AND images.classes = '$classes' AND images.arm = '$arm' AND student.activate = 'Active'";
                
              //  echo $sel_qry; die;
                
    $result = mysqli_query($connect, $sel_qry);
    
    if(mysqli_num_rows($result) > 0) {
        
        while($row = mysqli_fetch_array($result)) { ?>
            
<tr>

<th class="text-center" colspan="2">Student Result</th>

</tr>
</thead>
<tbody class="table-hover">
<tr>
<th class="text-center">Name</th>
<td class="text-left"><?php echo $row['name'] ?></td>
</tr>
<tr>
<th class="text-center">Exam No</th>
<td class="text-left"><?php echo $row['exam_no'] ?></td>
</tr>
<tr>
<th class="text-center">Session</th>
<td class="text-left"><?php echo $row['session'] ?></td>
</tr>
<tr>
<th class="text-center">Term</th>
<td class="text-left"><?php echo $row['term'] ?></td>
</tr>
<tr>
<th class="text-center">class</th>
<td class="text-left"><?php echo $row['classes'].$row['arm'] ?></td>
</tr>
<tr>
<th class="text-left"><a href="studentlogout.php"><span class="pull-left" style="color: white;"><i class="fa fa-arrow-circle-left"></i>&nbsp; Logout </span></a></th>
<td class="text-center"><a style="color: red; text-decoration: none;" href="hide.php?f=uploads/<?php echo $row['file_name'] ?>"><h4>Click here to download your result</h4></a></td>
<?php die; ?>
</tr>
</tbody>
  
  <?php
        }
    } else { ?>

<div class="table-title">
<div>
<h3 style="color: red; text-align: center;">Review your entries and try again</h3>
<h4 style="color: blue; text-align: center; margin-top: -10px;">or contact the school management for help</h4>
</div>
</div>        
<table class="table-fill">
<thead>

</thead>
<tbody class="table-hover">
<tr>
<th class="text-center">Exam No</th>
<td class="text-left"><?php echo $admission_no ?></td>
</tr>
<tr>
<th class="text-center">Session</th>
<td class="text-left"><?php echo $session ?></td>
</tr>
<tr>
<th class="text-center">Term</th>
<td class="text-left"><?php echo $term ?></td>
</tr>
<tr>
<th class="text-center">class</th>
<td class="text-left"><?php echo $classes.$arm ?></td>
</tr>
<tr>
<th class="text-left"><a href="studentlogout.php"><span class="pull-left" style="color: white;"><i class="fa fa-arrow-circle-left"></i>&nbsp; Logout</span></a></th>
<td class="text-center" colspan="2"><h4 style="color: red;">Your result can't be found</h4></td>
</tr>
<tr>
<!--<th class="text-center" colspan="2">Logout</th>-->
</tr>

<?php
        

    }


}

?>
</tbody>


</table>
  

  </body>
  
  <?php
  
  }
  
  ?>