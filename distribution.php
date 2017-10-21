<?php
    session_start();
    $connection=mysqli_connect("localhost","root","","nimh") or die("Unable to connect to the database!");

    if(isset($_POST['get']))
    {
        $aadhar=mysqli_real_escape_string($connection,$_POST['aadhar']);
        $regno=mysqli_real_escape_string($connection,$_POST['regno']);
        $_SESSION["aadhar1"]=$aadhar;
        $_SESSION["reg"]=$regno;
        $query="select * from registration where registration_number='$regno' and aadhar='$aadhar'";
        if(mysqli_query($connection,$query))
        {
            $run=mysqli_query($connection,$query);
            $row=mysqli_fetch_array($run);
            $aadhar=$row['aadhar'];
            $regno=$row['registration_number'];
            $fname=$row['fname'];
            $lname=$row['lname'];
            $age=$row['age'];
            $sex=$row['sex'];
            $fincome=$row['fincome'];
            $caste=$row['caste'];
            $propic=$row['picture'];
            $Recommended_Kit=$row['Recommended_Kit'];
            
            $query1="select * from kit_costs where type='$Recommended_Kit'";
            $result=mysqli_query($connection,$query1);
            $row=mysqli_fetch_array($result);
           
            $KitCost=$row['cost'];
            $subsidy_provided=$KitCost;
                    
        }
        
    }
    if(isset($_POST['submit']))
        {
            $date_given=date("d/m/Y");
            //$date_given=mysqli_real_escape_string($connection,$_POST['date_given']);
            $cost=mysqli_real_escape_string($connection,$_POST['cost']);
            $subsidy_provided=mysqli_real_escape_string($connection,$_POST['subsidy_provided']);
            $outbeneficiary=mysqli_real_escape_string($connection,$_POST['outbeneficiary']);
            $expenses=mysqli_real_escape_string($connection,$_POST['expenses']);
            $travel_allowance=mysqli_real_escape_string($connection,$_POST['travel_allowance']);
            $total_paid=mysqli_real_escape_string($connection,$_POST['total_paid']);
            $days_stayed=mysqli_real_escape_string($connection,$_POST['days_stayed']);
            $accompanied=mysqli_real_escape_string($connection,$_POST['accompanied']);
            // $aadhar=mysqli_real_escape_string($connection,$_POST['aadhar']);
            // $regno=mysqli_real_escape_string($connection,$_POST['regno']);


            /*$sql="INSERT INTO registration (date_given,cost,subsidy_provided,outbeneficiary,expenses,travel_allowance,
                                            total_paid,days_stayed,accompanied) VALUES 
                                            ('$date_given',$cost,$subsidy_provided,$outbeneficiary,$expenses,$travel_allowance,
                                              $total_paid,'$days_stayed','$accompanied')
                                             where aadhar='$aadhar' and registration_number='$regno'";*/

            
            $cost=(int)$cost;
            $subsidy_provided=(int)$subsidy_provided;
            $expenses=(int)$expenses;
            $outbeneficiary=(int)$outbeneficiary;
            $travel_allowance=(int)$travel_allowance;
            $total_paid=(int)$total_paid;
            $days_stayed=(int)$days_stayed;

            // echo $_SESSION["aadhar1"];                      
            //   echo $_SESSION["reg"];
            // echo gettype($_SESSION["aadhar1"]);

            $sql="update registration set date_given='$date_given',cost=$cost,subsidy_provided=$subsidy_provided,
                                          outbeneficiary=$outbeneficiary,expenses=$expenses,travel_allowance=$travel_allowance,
                                          total_paid=$total_paid,days_stayed=$days_stayed,accompanied='$accompanied'
                                          where aadhar='{$_SESSION['aadhar1']}' and registration_number='{$_SESSION['reg']}'";                                
            
            if(mysqli_query($connection,$sql))
            {
                echo "<script>
                    alert(\"Database updated successfully..please distribute the kit !!\");
                </script>";
                header("refresh:1;url=undertaking.php");
            }
            else
            {
                echo "<script>
                    alert(\"Updation failed!\");
                </script>";
                header("refresh:1;url=distribution.php");
            }
            // header("location:registration.php");
            exit;    
    }
    
?>
<html lang="en">
<head>  
    <title>TLM Kits Distribution</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style> 
        body {
            background-image: url("1.jpg");
            background-color: #cccccc;
        }
    </style>
    <script>
        function validateForm() {
            var aadhar = document.forms["getDetails"]["aadhar"].value;
            var regno = document.forms["getDetails"]["regno"].value;
            if (aadhar.toString().length<12 || aadhar.toString().length>12 ) {
                alert("Invalid aadhar number.");
                document.getElementById("aadhar").focus();
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
        <h2 style="text-align:center;color:white;">NIEPID TLM Kits Distribution</h2>
        <br>
    </div>
    <div class="container col-md-8">
    <form name='getDetails' method='post' action='' 
          onsubmit="return validateForm()" style="border:0px;border-style:solid;padding:25px;background-color:white;">
        <br>
        <div class="form-row">
            <label for="aadhar" class="col-form-label">Aadhar Number :</label>
            <div class="form-group col-md-3">
                <input type="number" class="form-control" name="aadhar" id="aadhar" required>
            </div>
            <label for="regno" class="col-form-label">Registration No :</label>
            <div class="form-group col-md-2">
                <input type="number" class="form-control" name="regno" id="regno" required>
            </div>
            <div class="form-group col-md-2">
                <input class="btn btn-secondary" type="submit" name="get" value="Get Details">
            </div>
        </div>
        </form>
        <form name='distribution' method='post' action='' style="border:1px;border-style:solid;padding:25px;background-color:white;">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="fname" class="col-form-label">First Name</label>
                <input type="text" class="form-control" id="fname" value="<?php if(isset($fname)) echo $fname; ?>" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="lname" class="col-form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" value="<?php if(isset($lname)) echo $lname; ?>" disabled>
                <!--<img src="l.jpg" width="80px" height="80px">-->
            </div>
            
        </div>
        <img src="<?php if(isset($propic)) echo $propic; ?>" style="float:right;" width="150px" height="150px" alt="profile picture">

        <div class="row">
            <div class="form-group col-md-4">
                <label for="fname" class="col-form-label">Aadhar Number</label>
                <input type="text" class="form-control" name="aadhar" value="<?php if(isset($aadhar)) echo $aadhar; ?>" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="lname" class="col-form-label">Registration Number</label>
                <input type="text" class="form-control" name="regno" value="<?php if(isset($regno)) echo $regno; ?>" disabled>
                <!--<img src="l.jpg" width="80px" height="80px">-->
            </div>
            
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="age" class="col-form-label">Age</label>
                <input type="text" class="form-control bfh-number" name="age" value="<?php if(isset($age)) echo $age; ?>" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="lname" class="col-form-label">Sex</label>
                <input type="text" class="form-control" name="sex" value="<?php if(isset($sex)) echo $sex; ?>" disabled>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="fincome" class="col-form-label">Family Income (Per Annum)</label>
                <input type="text" class="form-control" name="fincome" value="<?php if(isset($fincome)) echo $fincome; ?>" disabled>
            </div>
            <div class="form-group col-md-3">
                <label for="lname" class="col-form-label">Caste</label>
                <input type="text" class="form-control" name="caste" value="<?php if(isset($caste)) echo $caste; ?>" disabled>
            </div>
            <div class="col-md-2">
            </div>
            <!--<div class="col-md-3">
                <img src="<?php if(isset($propic)) echo $propic; ?>" style="float:right;" width="150px" height="150px" alt="profile picture">
            </div>-->
        </div>
        
        <div class="form-row">
            <br>
	    <hr/>	
            ---------------------------------------------------------------------------------------------------------------------------------
            <p align="center" style="text-align:right;">TLM Kit Details</p>
            <br>
        </div>

    

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="type_aid" class="col-form-label">Type of Aid (Recommended)</label>
                <input type="text" class="form-control" id="type_aid" value="<?php if(isset($Recommended_Kit)) echo $Recommended_Kit; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="date" class="col-form-label">Date on which given</label>
                <?php $date1=date("d/m/Y"); ?>
                <input type="text" class="form-control" name="date_given" placeholder="DD/MM/YY" disabled value="<?php echo $date1; ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="total_cost" class="col-form-label">Total Cost of Aid</label>
                <input type="number" class="form-control" id="cost" name="cost" value="<?php echo $KitCost; ?>">
            </div>
        </div>
        <div class="form-row">
            <br>
            ---------------------------------------------------------------------------------------------------------------------------------
            <br>
            Amount to be paid by NIEPID
            <br><br>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="subsidy" class="col-form-label">Subsidy Provided ( % )<b style="color:red;"> *</b></label>
                <input type="number" class="form-control" name="subsidy_provided" id="subsidy" min="0" max="100" placeholder="0 - 100" required>
            </div>&emsp;
            
            <label for="sex" class="col-form-label">Outstation Beneficiary?<b style="color:red;"> *</b></label>
            <div class="form-group col-md-3">
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="ob" id="OBYes" value="Yes" onclick="ShowHideDiv()"> Yes       
                </div>
                <div class="form-check form-check-inline">
                </div>
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="ob" id="OBNo" value="No" onclick="ShowHideDiv()"> No
                </div>
            </div>
            <script>
                function ShowHideDiv() {
                var OBYes = document.getElementById("OBYes");
                var dvtext = document.getElementById("dvtext");
                dvtext.style.display = OBYes.checked ? "block" : "none";
                }
            </script>  
            <div class="form-group col-md-3" id="dvtext" style="display:none">
                <label for="subsidy" class="col-form-label">Enter Beneficiary amount</label>
                <input type="number" class="form-control" name="outbeneficiary" id="OBamt" value=0>
            </div>
              
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="paid_expen" class="col-form-label">Board & Lodging expenses</label>
                <input type="number" class="form-control" name="expenses" id="paid_expen" value=0 required>
            </div>&emsp;
            <label for="sex" class="col-form-label">Travel Allowance?<b style="color:red;"> *</b></label>
            <div class="form-group col-md-3">
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="ta" id="TAYes" value="Yes" onclick="ShowHideDiv2()"> Yes       
                </div>
                <div class="form-check form-check-inline">
                </div>
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="ta" id="TANo" value="No" onclick="ShowHideDiv2()"> No
                </div>
            </div>
            <script>
                function ShowHideDiv2() {
                var OBYes = document.getElementById("TAYes");
                var dvtext2 = document.getElementById("dvtext2");
                dvtext2.style.display = TAYes.checked ? "block" : "none";
                }
            </script>  
            <div class="form-group col-md-3" id="dvtext2" style="display:none">
                <label for="subsidy" class="col-form-label">Enter amount</label>
                <input type="number" class="form-control" name="travel_allowance" id="TAamt" value=0>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-3">
                <div class="form-check form-check-inline">
                    <label for="level" class="col-form-label"><br></label><br>
                    <button type="button" class="btn btn-primary" onclick="ComputeTotal()">Compute Total</button>       
                </div>
                
                <script>
                function ComputeTotal(){
                    var subsidy=document.getElementById('subsidy').value;
                    var cost=document.getElementById('cost').value;
                    var subsidized_cost=(1-(subsidy/100))*cost;
                    var expenses=document.getElementById('paid_expen').value;
                    var beneficiary=document.getElementById('OBamt').value;
                    var travel=document.getElementById('TAamt').value;
                    
                    var total=parseFloat(subsidized_cost)+parseInt(expenses)+parseInt(beneficiary)+parseInt(travel);
                    // alert(total);
                    document.getElementById('total').value=parseFloat(total);
                    document.getElementById('sub_cost').value=parseFloat(subsidized_cost); 
                    }
                </script>
            </div>     
            &emsp;
             <div class="form-group col-md-3">
                <label for="paid_expen" class="col-form-label">Subsidized Kit price</label>
                <input type="number" class="form-control" name="sub_cost" id="sub_cost" value=0 required disabled>
            </div>&emsp;&emsp;
            <div class="form-group col-md-3">
                <label for="total_cost" class="col-form-label">Total to be paid</label>
                <input type="number" class="form-control" id="total" name="total_paid" required>
            </div>
        </div>
        <div class="form-row">
            <br>
            ---------------------------------------------------------------------------------------------------------------------------------
            <br><br>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="days_stayed" class="col-form-label">No.of days stayed<b style="color:red;"> *</b></label>
                <input type="number" class="form-control" name="days_stayed" required>
            </div>
            <!--<div class="form-group col-md-3">
                <label for="last_date" class="col-form-label">Date of Aids last received</label>
                <input type="text" class="form-control" id="last_date" placeholder="DD/MM/YY" value="<?php echo $last_received;?>">
            </div>-->
            <div class="form-group col-md-3">
                <label for="accompanied" class="col-form-label">Accompanied by Escort?<b style="color:red;"> *</b></label>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="accompanied" id="accompanied1" value="yes"> Yes       
                </div>
                <div class="form-check form-check-inline">
                </div>
                <div class="form-check form-check-inline">
                    <br><br>
                    <input class="form-check-input" type="radio" name="accompanied" id="accompanied2" value="no"> No
                </div>
            </div>
        </div>
        
        
        <div class="form-group">
            <br>
            <input class="btn btn-primary" type="submit" name="submit" value="Update Details">    
        </div>
        
    </form>
</div>   
<br>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>