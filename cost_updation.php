<?php

    session_start();
    $connection=mysqli_connect("localhost","root","","nimh") or die("Unable to connect to the database!");

    if(isset($_POST['submit']))
    {
        $type=mysqli_real_escape_string($connection,$_POST['type']);
        $cost=mysqli_real_escape_string($connection,$_POST['cost']);
        $cost=(int)$cost;
        
        $query="update kit_costs set cost=$cost where type='$type'";
        if(mysqli_query($connection,$query))
        {
            echo "<script>
                alert(\"Kit Cost succesfully updated !\");
            </script>";
        }
        else{
            echo "<script>
                alert(\"Updation failed.. please try again !\");
            </script>"; 
        }

    }

?>


<html lang="en">
<head>  
    <title>TLM Kits Distribution</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
    <link href="css/undertakingcss.css" rel="stylesheet">
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
        <h2 style="text-align:center;color:white;">NIEPID TLM Kits Distribution</h2>
        <br>
    </div>
    <div class="testbox" style="height:300px;">
  <h1>Update costs of Kits</h1>

  <form name='undertaking' method='post' action=''>
        
        <hr>
            
        <label id="icon" for="name"><i class="icon-asterisk "></i></label>
        <!--<input type="text" name="type" id="name" placeholder="Type of Kit" required/>-->
        <select style="width: 200px; 
                    height: 39px; 
                    -webkit-border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
                    -moz-border-radius: 0px 4px 4px 0px/0px 0px 4px 4px; 
                    border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
                    background-color: #fff; 
                    -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
                    -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
                    box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
                    border: solid 1px #cbc9c9;
                    margin-left: -5px;
                    margin-top: 13px; 
                    padding-left: 10px;" name="type" required>
            <option value="Type 1">Type 1</option>
            <option value="Type 2">Type 2</option>
            <option value="Type 3">Type 3</option>
            <option value="Type 4">Type 4</option>
        </select>
        <label id="icon" for="name"><i class="icon-asterisk"></i></label>
        <input type="text" name="cost" id="name" placeholder="Cost" max="100" required/>
        <br>
        <!--<label id="icon" for="name"><i class="icon-shield"></i></label>
        <input type="password" name="name" id="name" placeholder="Last Reg No (if any)"/>-->
        <br><br>
    
        <div align="center">
            <input type="submit" class="btn btn-primary" name="submit" value="Update">
        </div>
     </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  
  </body>
</html>