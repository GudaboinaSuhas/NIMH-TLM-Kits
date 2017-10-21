<?php
    session_start();
    $connection=mysqli_connect("localhost","root","","nimh") or die("Unable to connect to the database!");
    
	
	
    if(isset($_POST['submit']))
    {
        $aadhar=mysqli_real_escape_string($connection,$_POST['aadhar']);
        $fname=mysqli_real_escape_string($connection,$_POST['fname']);
        $age=mysqli_real_escape_string($connection,$_POST['age']);
	     
        $age=(int)$age;

        $query="select * from registration where aadhar='$aadhar' and fname='$fname' and age=$age
                ORDER BY registration_number DESC LIMIT 1";
        $result=mysqli_query($connection,$query);
        $check=mysqli_num_rows($result);
        if($check==0){
            echo "<script>
                alert(\"No records matched.. Candidate can register!\");
            </script>";
            header("refresh:1;url=registration.php");
            exit;
        }
        $row=mysqli_fetch_array($result);

        
        $last_received=date_create($row['date_given']);
        // $present_date=date("d/m/Y");
        $present_date=new DateTime();
        $diff=date_diff($present_date,$last_received);
        $diff=$diff->y;
        $last_received=$row['date_given'];
        if($row['age']>12 and $diff < 3)
        {
            echo "<script>
                alert(\"You couldn't apply for the kit now, please come later or please provide correct details!\");
            </script>";
        }
        else if($row['age']<12 and $diff < 1)
        {
            echo "<script>
                alert(\"You couldn't apply for the kit now, please come later or please provide correct details!\");
            </script>";
        }
        else{
            echo "<script>
                alert(\"Constraint satisfied, you can proceed for registration...                             Your last received date is $last_received !\");
            </script>";
            header("refresh:1;url=registration.php");
        }
    }

?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
    <link href="css/undertakingcss.css" rel="stylesheet">
    <title>TLM Kits Distribution</title>
    <style> 
        body {
            background-image: url("1.jpg");
            background-color: #cccccc;
        }
    </style>
    <script>
        function validateForm() {
            var aadhar = document.forms["undertaking"]["aadhar"].value;
            var name = document.forms["undertaking"]["name"].value;
            if (aadhar.toString().length<12 || aadhar.toString().length>12 ) {
                alert("Invalid aadhar number.");
                return false;
            }
            var patt = new RegExp("[0-9]");
            if(patt.test(name)){
                alert("Invalid name.");
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

<div class="testbox" style="height:480px;">
  <h1>Undertaking</h1>

  <form name='undertaking' method='post' action='' onsubmit="return validateForm()">
        
        <hr>
            
        <label id="icon" for="name"><i class="icon-asterisk "></i></label>
        <input type="number" name="aadhar" id="aadhar" placeholder="Aadhar Number" required/>
        <label id="icon" for="name"><i class="icon-user"></i></label>
        <input type="text" name="fname" id="name" placeholder="First Name (on Aadhar)" required/>
        <label id="icon" for="name"><i class="icon-asterisk"></i></label>
        <input type="number" min="1" max="100" name="age" id="age" placeholder="Age" max="100" required/>
        <br>
        <!--<label id="icon" for="name"><i class="icon-shield"></i></label>
        <input type="password" name="name" id="name" placeholder="Last Reg No (if any)"/>-->
        <br><br>
        <p>Conditions:<br>- Candidate age above 12 : shouldn't have received any kit in past 3 years.
                 <br>- Candidate age below 12 : shouldn't have received any kit in past 1 year.<br><br></p>
        <div align="center">
            <input type="submit" class="btn btn-primary" name="submit" value="Proceed">
        </div>
  </form>
</div>
<br><br>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>