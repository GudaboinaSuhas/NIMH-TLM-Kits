<?php
session_start();
$connection=mysqli_connect("localhost","root","","nimh") or die("Unable to connect to the database!");


?>
<html lang="en">
<head>  
    <title>TLM Registered People List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body style="background-color:grey">
    <div class="container">
        <br>
        <h2 style="text-align:center">NIEPID TLM Kits Registered People List</h2>
        <br>
    </div>
    <div class="container col-md-8">
    <form style="border:1px;border-style:solid;padding:25px;background-color:white;" enctype="multipart/form-data" action='excel.php' method='post'>
        <br>
        <div class="form-row">
            Download Registered People List(Excel File).        
        </div>
        
        
        
        <div class="form-group">
            <br>
            <input type="submit" class="btn btn-primary" name="submit" value="Download">    
        </div>
        
    </form>
</div>   
<br>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>