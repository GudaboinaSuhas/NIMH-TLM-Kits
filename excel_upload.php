<?php 

if ( isset($_POST["submit"]) ) {

    if ( isset($_FILES["file"])) {

        $filetmp=$_FILES['file']['tmp_name'];
        $filename=$_FILES['file']['name'];
        $filetype=$_FILES['file']['type'];
        $filepath="excel_dir/".$filename;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $filepath))
            echo "<script>
                alert(\"Excel file successfully uploaded!\");
            </script>";
    }
}


    if ( isset($_POST["run"]) ) {
    
        session_start();
        $connection=mysqli_connect("localhost","root","","nimh") or die("Unable to connect to the database!");

        $databasetable = "registration";

        set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

        include 'PHPExcel/IOFactory.php';

        $inputFileName = 'excel_dir/registration_excel.xlsx';

        

        try {

            $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

        } catch(Exception $e) {

            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());

        }


        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        $arrayCount = count($allDataInSheet);  
        // echo $arrayCount; 

        for($i=2;$i<=$arrayCount;$i++){

            $registration_date = trim($allDataInSheet[$i]["A"]);
            $fname = trim($allDataInSheet[$i]["B"]);
            $lname = trim($allDataInSheet[$i]["C"]);
            $age = trim($allDataInSheet[$i]["D"]);
            $sex = trim($allDataInSheet[$i]["E"]);
            $address = trim($allDataInSheet[$i]["F"]);
            $village = trim($allDataInSheet[$i]["G"]);
            $district = trim($allDataInSheet[$i]["H"]);
            $state = trim($allDataInSheet[$i]["I"]);
            $gname = trim($allDataInSheet[$i]["J"]);
            $phone = trim($allDataInSheet[$i]["K"]);
            $fincome = trim($allDataInSheet[$i]["L"]);
            $level = trim($allDataInSheet[$i]["M"]);
            $rkit = trim($allDataInSheet[$i]["N"]);
            $aadhar = trim($allDataInSheet[$i]["O"]); 
            $caste = trim($allDataInSheet[$i]["P"]);
            $escort = trim($allDataInSheet[$i]["Q"]);
            $ephone = trim($allDataInSheet[$i]["R"]);

            $query = "SELECT fname,aadhar,registration_date FROM registration WHERE fname = '$fname' and aadhar = '$aadhar'
                        and registration_date='$registration_date'";
            $sql = mysqli_query($connection,$query);
            $Result = mysqli_fetch_array($sql);   
            $existName = $Result['fname'];

            if($existName=="") {

                $sql= "INSERT INTO registration (registration_number,registration_date,fname,lname,age,sex,address,village,
                                                    district,state,gname,phone,fincome,level,Recommended_Kit,aadhar,caste,escort,ephone) VALUES 
                                                    (NULL,'$registration_date', '$fname', '$lname','$age', '$sex','$address','$village',
                                                    '$district', '$state','$gname', '$phone','$fincome','$level','$rkit',
                                                    '$aadhar','$caste','$escort','$ephone');";
                
                
                if(mysqli_query($connection,$sql))
                    $msg = 'Record has been added. <div style="Padding:20px 0 0 0;"></div>';
            } 
            else {
                $msg = 'Record '.$fname.' with aadhar number ' .$aadhar. ' already exist ! The record has been ignored.
                        <br> Registration done on '.$registration_date.'.';
            }

            }
    
    }

 
?>
<html>
    <head>
        <title>Upload Excel</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

        <style> 
        body {
            background-image: url("1.jpg");
            background-color: #cccccc;
        }
    	</style>
    </head>
    <body>
        		<div>
        <nav class="navbar navbar-toggleable-md navbar-light" style="background-color: #003366;">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#" style="color:white">NIEPID</a>
            <div class="collapse navbar-collapse" id="navbarColor03" aria-expanded="true" style>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" style="color:white;" href="undertaking.php">Undertaking Form</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="color:white;" href="distribution.php">Distribution</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="color:white;" href="cost_updation.php">Updation of Kit Costs</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="color:white;" href="download_excel.php">Download Excel</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="color:white;" href="excel_upload.php">Upload Excel</a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
		<div class="container">
			<br>
			<h2 style="text-align:center;color:white">NIEPID TLM Kits Registered People List</h2>
			<br>
		</div>
        <div class="container col-md-8">
			<form style="border:1px;border-style:solid;margin:0px;padding:25px;background-color:white;" 
                    enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method='post'>
				<br>
				<div class="form-row">
				    Upload Registered People List(Excel File).          
				</div>
				
				
				
				<div class="form-group">
					<br>
					<input type="file" name="file" id="file" />    
				    <input class="btn btn-primary" type="submit" name="submit" value="upload" style="color:white;float:right;"> 
                </div>
            </form>
            <form style="border:1px;border-style:solid;margin:0px;padding:25px;background-color:white;" 
                            action="<?php echo $_SERVER["PHP_SELF"]; ?>" method='post'>
                <br>
                <div align="center" style="background-color:white;">
                    <p>Update the uploaded excel file records into the database </p>
                    <input class="btn btn-primary" type="submit" name="run" value="Run query" style="color:white;">
                </div><br>
                <?php if(isset($msg))
                        {
                            echo $msg; 
                            header("refresh:4;url=excel_upload.php");
                        }
                ?>
			</form>
            
		</div>   
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    </body>
</html>
        
    </body>