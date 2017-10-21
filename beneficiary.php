<?php
session_start();
$connection=mysqli_connect("localhost","root","","nimh") or die("Unable to connect to the database!");
//$connection=mysqli_connect("localhost","id918800_minip","minip","id918800_minip") or die("Unable to connect to the database!");

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
    <!--<div>
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
        </div>-->
        
    <div class="container">
        <br>
        <h2 style="text-align:center;color:white">NIEPID TLM Kits Beneficiary Slip</h2>
        <br>
    </div>
    <div class="container col-md-8">
        <form style="border:1px;border-style:solid;padding:25px;background-color:e3f2fd;">
             <img src="Logo.jpg" width="820px" alt="Nimh banner"><br><br>
             <div align="center"><h4><u>Beneficiary Slip</u></h4></div><br><br>
             &emsp;&emsp;&emsp;<b>Registration Number : </b><?php echo $_SESSION['regno']; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
             &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Registration Date : </b><?php echo $_SESSION['date']; ?><br><br>
             &emsp;&emsp;&emsp;<b>Name of the beneficiary : </b><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?><br><br>
             &emsp;&emsp;&emsp;<b>Age : </b><?php echo $_SESSION['age']; ?>
             &emsp;&emsp;&emsp;<b>Gender : </b><?php echo $_SESSION['gender']; ?><br><br>
             &emsp;&emsp;&emsp;<b>Village/Taluka/Mandal : </b><?php echo $_SESSION['village']; ?>
             &emsp;&emsp;&emsp;<b>District : </b><?php echo $_SESSION['district']; ?>
             &emsp;&emsp;&emsp;<b>State : </b><?php echo $_SESSION['state']; ?> <br><br>  
             &emsp;&emsp;&emsp;<b>Recommended Kit : </b><?php echo $_SESSION['type']; ?><br><br><br><br>
             &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
             &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
             &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Signature of the incharge</b>       
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
