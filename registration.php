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
    $aadhar=mysqli_real_escape_string($connection,$_POST['aadhar']);
    $caste=mysqli_real_escape_string($connection,$_POST['caste']); 
    $escort=mysqli_real_escape_string($connection,$_POST['escort']);        
    $ephone=mysqli_real_escape_string($connection,$_POST['ephone']);
            
    
    $filetmp=$_FILES['picture']['tmp_name'];
    $filename=$_FILES['picture']['name'];
    $filetype=$_FILES['picture']['type'];
    $filepath1="C:/xampp/htdocs/NIMH/profile_pics/".$filename;
    move_uploaded_file($filetmp,$filepath1);

    $filetmp=$_FILES['esc_pic']['tmp_name'];
    $filename=$_FILES['esc_pic']['name'];
    $filetype=$_FILES['esc_pic']['type'];
    $filepath2="C:/xampp/htdocs/NIMH/escort_pics/".$filename;
    move_uploaded_file($filetmp,$filepath2);

    $filetmp=$_FILES['a_proof']['tmp_name'];
    $filename=$_FILES['a_proof']['name'];
    $filetype=$_FILES['a_proof']['type'];
    $filepath3="C:/xampp/htdocs/NIMH/aadhar_proof/".$filename;
    move_uploaded_file($filetmp,$filepath3);

    $filetmp=$_FILES['d_proof']['tmp_name'];
    $filename=$_FILES['d_proof']['name'];
    $filetype=$_FILES['d_proof']['type'];
    $filepath4="C:/xampp/htdocs/NIMH/disability_proof/".$filename;
    move_uploaded_file($filetmp,$filepath4);

    $filetmp=$_FILES['i_proof']['tmp_name'];
    $filename=$_FILES['i_proof']['name'];
    $filetype=$_FILES['i_proof']['type'];
    $filepath5="C:/xampp/htdocs/NIMH/income_proof/".$filename;
    move_uploaded_file($filetmp,$filepath5);

    $sql="INSERT INTO registration (registration_number,fname,lname,picture,age,sex,address,village,
                                    district,state,gname,phone,fincome,level,aadhar,caste,escort,ephone,
                                    esc_pic,a_proof,d_proof,i_proof) VALUES 
                                    (NULL, '$fname', '$lname', '$filepath1','$age', '$sex','$address','$village',
                                    '$district', '$state','$gname', '$phone','$fincome','$level','$aadhar','$caste','$escort','$ephone',
                                    '$filepath2', '$filepath3', '$filepath4','$filepath5');";
    if(mysqli_query($connection,$sql))
    {
        echo "<script>
            alert(\"Registration successfull!\");
        </script>";
    }
    else
        echo "<script>
            alert(\"Registration failed!\");
        </script>";
        
    header("refresh:2;url=registration.php");
    // header("location:registration.php");
    exit;    
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
                        <a class="nav-link" href="#">Home</a>
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
    <form style="border:1px;border-style:solid;padding:25px;background-color:e3f2fd;" enctype="multipart/form-data" name='register' method='post' action=''>
        <br>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="fname" class="col-form-label">First Name</label>
                <input type="text" class="form-control" name="fname" required>
            </div>
            <div class="form-group col-md-4">
                <label for="lname" class="col-form-label">Last Name</label>
                <input type="text" class="form-control" name="lname"  required>
            </div>
            <div class="form-group form-control-sm col-md-2">
                <label for="picture">Upload Picture</label>
                <input type="file" class="form-control-file" id="picture" name="picture" required >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="age" class="col-form-label">Age</label>
                <input type="number" min="1" max="100" class="form-control bfh-number" name="age" required >
            </div>
            <label for="sex" class="col-form-label">Sex</label>
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
                <label for="address" class="col-form-label">Address</label>
                <textarea type="text" rows="3" cols="7" class="form-control" name="address" required ></textarea>
            </div>
            <div class="form-group col-md-3">
                <label for="village" class="col-form-label">Village</label>
                <input type="text" class="form-control" name="village" placeholder="Village/Taluka/Mandal" required >
            </div>
            <div class="form-group col-md-3">
                <label for="district" class="col-form-label">District</label>
                <input type="text" class="form-control" name="district" required >
            </div>
            <div class="form-group col-md-3">
                <label for="state" class="col-form-label">State</label>
                <input type="text" class="form-control" name="state" required >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="guardian's name'" class="col-form-label">Guardian's Name</label>
                <input type="text" class="form-control" name="gname" placeholder="Father/Mother/Guardian Name" required  >
            </div>
            <div class="form-group col-md-3">
                <label for="phone" class="col-form-label">Phone No</label>
                <input type="text" class="form-control" name="phone" minlength="10" maxlength="10" size="10" required >
            </div>
            <div class="form-group col-md-3">
                <label for="fincome" class="col-form-label">Family Income (Per Annum)</label>
                <input type="text" class="form-control" name="fincome" required >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="level" class="col-form-label">Diagnosis & Level of ID</label>
                <input type="text" class="form-control" name="level" required >
            </div>
            <div class="form-group col-md-3">
                <label for="level" class="col-form-label">Recommended Kit</label>
                <input type="text" class="form-control" name="level" disabled >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="aadhar" class="col-form-label">Aadhar Number</label>
                <input type="number" class="form-control" name="aadhar" minlength="12" maxlength="12" required >
            </div>
            <label for="caste" class="col-form-label">Caste</label>
            <div class="form-group col-md-3">
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="caste" value="SC"> SC       
                </div>
                <div class="form-check form-check-inline">
                </div>
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="caste" value="ST"> ST
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
                <input type="text" class="form-control" name="escort" placeholder="Father/Mother/Guardian Name" required >
            </div>
            <div class="form-group col-md-3">
                <label for="phone" class="col-form-label">Phone No</label>
                <input type="text" class="form-control" name="ephone" required >
            </div>
            <div class="form-group form-control-sm col-md-4">
                <label for="esc_pic">Upload Escort's Proof(any)</label>
                <input type="file" class="form-control-file" id="esc_pic" name="esc_pic" required>
            </div>
        </div>
        <div class="form-row">   
            <div class="form-group form-control-sm col-md-4">
                <label for="proof1">Upload Aadhar Proof</label>
                <input type="file" class="form-control-file" id="a_proof" name="a_proof" required>
            </div>
            <div class="form-group form-control-sm col-md-4">
                <label for="proof2">Upload Disability form</label>
                <input type="file" class="form-control-file" id="d_proof" name="d_proof" required >
            </div>
            <div class="form-group form-control-sm col-md-4">
                <label for="proof3">Upload BPL(Tahsildar) / Income Certificate</label>
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