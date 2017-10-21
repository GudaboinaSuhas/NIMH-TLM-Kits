<?php
session_start();
$connection=mysqli_connect("localhost","root","","nimh") or die("Unable to connect to the database!");
//$connection=mysqli_connect("localhost","id918800_minip","minip","id918800_minip") or die("Unable to connect to the database!");

//$fname=$lname=$picture=$age=$sex=$address=$village=$district=$state=$gname=$phone=$fincome="";
//$level=$aadhar=$caste=$escort=$ephone=$esc_pic=$a_proof=$d_proof=$i_proof="";

if(isset($_POST['submit']))
{
    $fname=mysqli_real_escape_string($connection,$_POST['fname']);
    $lname=mysqli_real_escape_string($connection,$_POST['lname']);
    $age=mysqli_real_escape_string($connection,$_POST['age']);
    $sex=mysqli_real_escape_string($connection,$_POST['sex']);
    $address=mysqli_real_escape_string($connection,$_POST['address']);
    $village=mysqli_real_escape_string($connection,$_POST['village']);
    $district=mysqli_real_escape_string($connection,$_POST['district']);
    $state=mysqli_real_escape_string($connection,$_POST['state']);
    $gname=mysqli_real_escape_string($connection,$_POST['gname']);
    $phone=mysqli_real_escape_string($connection,$_POST['phone']);
    $fincome=mysqli_real_escape_string($connection,$_POST['fincome']);
    $level=mysqli_real_escape_string($connection,$_POST['level']);
    $rkit=mysqli_real_escape_string($connection,$_POST['rkit']);
    $aadhar=mysqli_real_escape_string($connection,$_POST['aadhar']);
    $caste=mysqli_real_escape_string($connection,$_POST['caste']); 
    $escort=mysqli_real_escape_string($connection,$_POST['escort']);        
    $ephone=mysqli_real_escape_string($connection,$_POST['ephone']);
            
    
    $filetmp=$_FILES['picture']['tmp_name'];
    $filename=$_FILES['picture']['name'];
    $filetype=$_FILES['picture']['type'];
    $filepath1="profile_pics/".$filename;
	 $filetmp=$_FILES['esc_pic']['tmp_name'];
    $filename=$_FILES['esc_pic']['name'];
    $filetype=$_FILES['esc_pic']['type'];
    $filepath2="escort_pics/".$filename;
	 $filetmp=$_FILES['a_proof']['tmp_name'];
    $filename=$_FILES['a_proof']['name'];
    $filetype=$_FILES['a_proof']['type'];
    $filepath3="aadhar_proof/".$filename;
	 $filetmp=$_FILES['d_proof']['tmp_name'];
    $filename=$_FILES['d_proof']['name'];
    $filetype=$_FILES['d_proof']['type'];
    $filepath4="disability_proof/".$filename;
	
    $filetmp=$_FILES['i_proof']['tmp_name'];
    $filename=$_FILES['i_proof']['name'];
    $filetype=$_FILES['i_proof']['type'];
    $filepath5="income_proof/".$filename;

    $registration_date=date("d/m/Y");
	
	 $sql="INSERT INTO registration (registration_number,registration_date,fname,lname,picture,age,sex,address,village,
                                    district,state,gname,phone,fincome,level,Recommended_Kit,aadhar,caste,escort,ephone,
                                    esc_pic,a_proof,d_proof,i_proof) VALUES 
                                    (NULL,'$registration_date','$fname', '$lname', '$filepath1','$age', '$sex','$address','$village',
                                    '$district', '$state','$gname', '$phone','$fincome','$level','$rkit',
                                    '$aadhar','$caste','$escort','$ephone',
                                    '$filepath2', '$filepath3', '$filepath4','$filepath5');";
  $i = mysqli_query($connection,$sql);
	
	
	if($i==0)
	{
	echo "<script>alert('Data already Exists');</script>";	
		
	}
	else{
                // move_uploaded_file($filetmp,$filepath1);
                if(move_uploaded_file($_FILES['picture']['tmp_name'],$filepath1)){
                    }
            
                if(move_uploaded_file($_FILES['esc_pic']['tmp_name'], $filepath2)){
                    }

            
                if(move_uploaded_file ($_FILES['a_proof']['tmp_name'], $filepath3)){
                    }

            
                if(move_uploaded_file( $_FILES['d_proof']['tmp_name'], $filepath4)){
                    }

                if(move_uploaded_file($_FILES['i_proof']['tmp_name'], $filepath5)){
                    }
                
                $sql="select registration_number from registration order by registration_number desc limit 1;";
                $result=mysqli_query($connection,$sql);
                $array=mysqli_fetch_array($result,MYSQLI_ASSOC);

                $_SESSION['regno']=$array['registration_number'];
                $_SESSION['fname']=$fname;
                $_SESSION['lname']=$lname;
                $_SESSION['aadhar']=$aadhar;
                $_SESSION['age']=$age;
                $_SESSION['gender']=$sex;
                $_SESSION['village']=$village;
                $_SESSION['district']=$district;
                $_SESSION['state']=$state;
                $_SESSION['type']=$rkit;
                $_SESSION['date']=$registration_date;
                
                echo "<script>
                    alert(\"Registration Successful !\");
                </script>";
                header("refresh:1;url=beneficiary.php");

	
	}

    
}

?>
<html lang="en">
<head>  
    <title>TLM Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style> 
        body {
            background-image: url("1.jpg");
            background-color: #cccccc;
        }
    </style>
    <script>
        function validateForm() {
            var aadhar = document.forms["register"]["aadhar"].value;
            var fname = document.forms["register"]["fname"].value;
            var lname = document.forms["register"]["lname"].value;
            var village = document.forms["register"]["village"].value;
            var district = document.forms["register"]["district"].value;
            var state = document.forms["register"]["state"].value;
            var gname = document.forms["register"]["gname"].value;
            var phone = document.forms["register"]["phone"].value;
            
            if (aadhar.toString().length<12 || aadhar.toString().length>12 ) {
                alert("Invalid aadhar number.");
                document.getElementById("aadhar").focus();
                return false;
            }
            var patt = new RegExp("[0-9]");
            if(patt.test(fname)){
                alert("Invalid first name.");
                document.getElementById("fname").focus();
                return false;
            }
            if(patt.test(lname)){
                alert("Invalid last name.");
                document.getElementById("lname").focus();
                return false;
            }
            if(patt.test(village)){
                alert("Invalid village name.");
                document.getElementById("village").focus();
                return false;
            }
            if(patt.test(district)){
                alert("Invalid district name.");
                document.getElementById("district").focus();
                return false;
            }
            if(patt.test(state)){
                alert("Invalid state name.");
                document.getElementById("state").focus();
                return false;
            }
            if(patt.test(gname)){
                alert("Invalid guardian name.");
                document.getElementById("gname").focus();
                return false;
            }
            if(phone.toString().length !=10 ){
                alert("Invalid phone number.");
                document.getElementById("phone").focus();
                return false;
            }
        }
    </script>
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
        <h2 style="text-align:center;color:white">NIEPID TLM Kits Registration Form</h2>
        <br>
    </div>
    <div class="container col-md-8">
    <form style="border:1px;border-style:solid;padding:25px;background-color:e3f2fd;" 
          enctype="multipart/form-data" name='register' method='post' action='' onsubmit="return validateForm()">
        <br>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="fname" class="col-form-label">First Name<b style="color:red;"> *</b></label>
                <input type="text" class="form-control" name="fname" id="fname" required>
            </div>
            <div class="form-group col-md-4">
                <label for="lname" class="col-form-label">Last Name<b style="color:red;"> *</b></label>
                <input type="text" class="form-control" name="lname" id="lname" required>
            </div>
            <div class="form-group form-control-sm col-md-2">
                <label for="picture">Upload Picture<b style="color:red;"> *</b></label>
                <input type="file" class="form-control-file" id="picture" name="picture" required >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="age" class="col-form-label">Age<b style="color:red;"> *</b></label>
                <input type="number" min="1" max="100" class="form-control bfh-number" id="age" name="age" required >
            </div>
            <label for="sex" class="col-form-label">Sex<b style="color:red;"> *</b></label>
            <div class="form-group col-md-4">
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="sex" value="Male"> Male       
                </div>
                <div class="form-check form-check-inline">
                </div>
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="sex" value="Female"> Female
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="address" class="col-form-label">Address<b style="color:red;"> *</b></label>
                <textarea type="text" rows="3" cols="7" class="form-control" name="address" required ></textarea>
            </div>
            <div class="form-group col-md-3">
                <label for="village" class="col-form-label">Village<b style="color:red;"> *</b></label>
                <input type="text" class="form-control" name="village" id="village" placeholder="Village/Taluka/Mandal" required >
            </div>
            <div class="form-group col-md-3">
                <label for="district" class="col-form-label">District<b style="color:red;"> *</b></label>
                <input type="text" class="form-control" name="district" id="district" required >
            </div>
            <div class="form-group col-md-3">
                <label for="state" class="col-form-label">State<b style="color:red;"> *</b></label>
                <input type="text" class="form-control" name="state" id="state" required >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="guardian's name'" class="col-form-label">Guardian's Name<b style="color:red;"> *</b></label>
                <input type="text" class="form-control" name="gname" id="gname" placeholder="Father/Mother/Guardian Name" required  >
            </div>
            <div class="form-group col-md-3">
                <label for="phone" class="col-form-label">Phone No<b style="color:red;"> *</b></label>
                <input type="number" class="form-control" name="phone" id="phone" size="10" placeholder="ex :9988776655" required >
            </div>
            <div class="form-group col-md-3">
                <label for="fincome" class="col-form-label">Family Income(PerAnnum)<b style="color:red;"> *</b></label>
                <input type="number" class="form-control" name="fincome" required >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="level" class="col-form-label">Diagnosis & Level of ID<b style="color:red;"> *</b></label>
                <select class="form-control" name="level" id="level" required >
                    <option value="mild">Mild</option>
                    <option value="moderate">Moderate</option>
                    <option value="profound">Profound</option>
                    <option value="severe">Severe</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check form-check-inline">
                    <label for="level" class="col-form-label">Check Recommended Kit</label><br>
                    <button class="btn btn-primary" onclick="FillRKit()">Check</button>       
                </div>
                <script>
                            function FillRKit(){        
                                    var age=document.getElementById('age').value;
                                    var level=document.getElementById('level').value;
                                        if(age >= 0 && age < 4){
                                            if(level === 'mild' || level === 'moderate')
                                                register.rkit.value='Type 1';                  
                                        }
                                        else if(age >= 4 && age < 7){
                                            if(level === 'mild' || level === 'moderate')
                                                register.rkit.value='Type 2';                  
                                        }
                                        else if(age >= 7 && age < 11){
                                            if(level === 'mild' || level === 'moderate')
                                                register.rkit.value='Type 3';                  
                                        }
                                        else if(age >= 12){
                                            if(level === 'mild' || level === 'moderate')
                                                register.rkit.value='Type 4';                  
                                        }
                            }
                </script>
            </div>
            <div class="form-group col-md-3">
                <label for="level" class="col-form-label">Recommended Kit</label>
                <input type="text" class="form-control" name="rkit" id="rkit" > 

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="aadhar" class="col-form-label">Aadhar Number<b style="color:red;"> *</b></label>
                <input type="number" class="form-control" name="aadhar" id="aadhar"  required >
            </div>
            <label for="caste" class="col-form-label">Caste<b style="color:red;"> *</b></label>
            <div class="form-group col-md-3">
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="caste" value="SC" checked> SC       
                </div>
                <div class="form-check form-check-inline">
                </div>
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="caste" value="ST" > ST
                </div>
                <div class="form-check form-check-inline">
                </div>
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="caste" value="OBC"> OBC
                </div>
                <div class="form-check form-check-inline">
                </div>
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="caste" value="OC"> OC
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="escort" class="col-form-label">Escort's Name(optional)</label>
                <input type="text" class="form-control" name="escort" placeholder="Father/Mother/Guardian Name" >
            </div>
            <div class="form-group col-md-3">
                <label for="phone" class="col-form-label">Phone No</label>
                <input type="number" class="form-control" name="ephone" minlength="10" maxlength="10" size="10" placeholder="ex :9988776655" >
            </div>
            <div class="form-group form-control-sm col-md-4">
                <label for="esc_pic">Upload Escort's Proof(any)</label>
                <input type="file" class="form-control-file" id="esc_pic" name="esc_pic">
            </div>
        </div>
        <div class="form-row">   
            <div class="form-group form-control-sm col-md-4">
                <label for="proof1">Upload Aadhar Proof<b style="color:red;"> *</b></label>
                <input type="file" class="form-control-file" id="a_proof" name="a_proof" required>
            </div>
            <div class="form-group form-control-sm col-md-4">
                <label for="proof2">Upload Disability form<b style="color:red;"> *</b></label>
                <input type="file" class="form-control-file" id="d_proof" name="d_proof" required >
            </div>
            <div class="form-group form-control-sm col-md-4">
                <label for="proof3">Upload BPL / Income Certificate<b style="color:red;"> *</b></label>
                <input type="file" class="form-control-file" id="i_proof" name="i_proof" required >
            </div> 
        </div>
        
        <div class="form-group">
            <br>
            <input type="submit" class="btn btn-primary" name="submit" value="Register">    
        </div>
        
    </form>
</div>   
<br>

<footer class="page-footer black">
         <div class="footer-copyright">
            
         </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



</body>
</html>