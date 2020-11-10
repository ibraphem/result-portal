<?php
session_start();

//print_r($_POST); die;
    // Include the database configuration file
    include_once('config.php');
    
    $session = $_POST['session'];
    $term = $_POST['term'];
    $classes = $_POST['classes'];
    $arm = $_POST['arm'];
    
   // echo $session . " term: ". $term . " classes: " . $classes . " arm: " . $arm; die;
    
    // File upload configuration
    $targetDir = "uploads/";
    $allowTypes = array('pdf');
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if(array_filter($_FILES['files']['name']) != ""){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $admission_no = substr($fileName,0,-4); //echo $admission_no; die;
            $targetFilePath = $targetDir . $fileName;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."', '".$admission_no."', '".$session."', '".$term."', '".$classes."', '".$arm."', NOW()),";
                   // echo $insertValuesSQL; die;
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
                $statusMsg = '<html lang="en">
  <head>
    <title>Upload Error</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
        <link rel="apple-touch-icon" sizes="76x76" href="images/icons/echo.png"/>
    <link rel="icon" type="image/png" href="images/icons/echo.png"/>
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/bootstrap/css/bootstrap.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/select2/select2.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/utily.css" />
    <link rel="stylesheet" type="text/css" href="css/mainy.css" />
    <!--===============================================================================================-->
  </head>
  <body>
    <div
      class="bg-img1 size1 flex-w flex-c-m p-t-55 p-b-55 p-l-15 p-r-15"
      style="background-image: url("images/bg01.jpg");"
    >
      <div class="wsize1 bor1 bg1 p-t-175 p-b-45 p-l-15 p-r-15 respon1">
        <div class="wrappic1">
          <h1 style="text-align: center; margin-top: -180px; font-weight: 400; color:red;">
            Error: Only PDFs are allowed for upload
          </h1>
          <div>
            <img
              src="images/icons/error.png"
              style="height: 300px; width:300px; margin: 50px"
              alt="LOGO"
            />
          </div>
          <a href="http://localhost:8080/result_portal/result.php" class="txt-center p-t-10">
         <i class="fa fa-arrow-circle-left"></i>&nbsp;<b style="text-align:center";>Click here to go back</b>
        </a>
        </div>

       

       
      </div>
    </div>


    <!--===============================================================================================-->
    <script src="js/main.js"></script>
  </body>
</html>';               
            }
        }
        
        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL,',');
            // Insert image file name into database
            $insert = $db->query("INSERT INTO images (file_name, admission_no, session, term, classes, arm, uploaded_on) VALUES $insertValuesSQL");
           //echo $insert; die;
            if($insert){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = '<html lang="en">
  <head>
    <title>Upload Successful</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="apple-touch-icon" sizes="76x76" href="images/icons/echo.png"/>
    <link rel="icon" type="image/png" href="images/icons/echo.png"/>
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/bootstrap/css/bootstrap.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/select2/select2.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/utily.css" />
    <link rel="stylesheet" type="text/css" href="css/mainy.css" />
    <!--===============================================================================================-->
  </head>
  <body>
    <div
      class="bg-img1 size1 flex-w flex-c-m p-t-55 p-b-55 p-l-15 p-r-15"
      style="background-image: url("images/bg01.jpg");"
    >
      <div class="wsize1 bor1 bg1 p-t-175 p-b-45 p-l-15 p-r-15 respon1">
        <div class="wrappic1">
          <h1 style="text-align: center; margin-top: -180px; font-weight: 400; color:green;">
            Result uploaded succesfully
          </h1>
          <div>
            <img
              src="images/icons/success.png"
              style="height: 300px; width:300px; margin: 50px"
              alt="LOGO"
            />
          </div>
           <a href="http://localhost:8080/result_portal/result.php" class="txt-center p-t-10">
         <i class="fa fa-arrow-circle-left"></i>&nbsp;<b style="text-align:center";>Click here to go back</b>
        </a>
        </div>

       
      </div>
    </div>


    <!--===============================================================================================-->
    <script src="js/main.js"></script>
  </body>
</html>'.$errorMsg;
            }else{
                $statusMsg = '<html lang="en">
  <head>
    <title>Upload Error</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
        <link rel="apple-touch-icon" sizes="76x76" href="images/icons/echo.png"/>
    <link rel="icon" type="image/png" href="images/icons/echo.png"/>
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/bootstrap/css/bootstrap.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="vendor/select2/select2.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/utily.css" />
    <link rel="stylesheet" type="text/css" href="css/mainy.css" />
    <!--===============================================================================================-->
  </head>
  <body>
    <div
      class="bg-img1 size1 flex-w flex-c-m p-t-55 p-b-55 p-l-15 p-r-15"
      style="background-image: url("images/bg01.jpg");"
    >
      <div class="wsize1 bor1 bg1 p-t-175 p-b-45 p-l-15 p-r-15 respon1">
        <div class="wrappic1">
          <h1 style="text-align: center; margin-top: -180px; font-weight: 400; color:red;">
            Oops, results upload unsuccessful, please try again.
          </h1>
          <div>
            <img
              src="images/icons/error.png"
              style="height: 300px; width:300px; margin: 50px"
              alt="LOGO"
            />
          </div>
             <a href="http://localhost:8080/result_portal/result.php" class="txt-center p-t-10">
         <i class="fa fa-arrow-circle-left"></i>&nbsp;<b style="text-align:center";>Click here to go back</b>
        </a>
        </div>

       

       
      </div>
    </div>


    <!--===============================================================================================-->
    <script src="js/main.js"></script>
  </body>
</html>';
            }
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
    
    // Display status message
    echo $statusMsg;

?>