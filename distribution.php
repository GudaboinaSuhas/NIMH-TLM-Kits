
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
        <h2 style="text-align:center;color:white;">NIEPID TLM Kits Distribution</h2>
        <br>
    </div>
    <div class="container col-md-8">
    <form style="border:1px;border-style:solid;padding:25px;background-color:white;">
        <br>
        <div class="form-row">
            <label for="aadhar" class="col-form-label">Aadhar Number :</label>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" id="aadhar" minlength="12" required>
            </div>
            <label for="regno" class="col-form-label">Registration No :</label>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="regno" minlength="6" required>
            </div>
            <div class="form-group col-md-2">
                <input class="btn btn-secondary" type="submit" name="get" value="Get Details">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="fname" class="col-form-label">First Name</label>
                <input type="text" class="form-control" id="fname" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="lname" class="col-form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" disabled>
                <!--<img src="l.jpg" width="80px" height="80px">-->
            </div>
            
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="age" class="col-form-label">Age</label>
                <input type="text" class="form-control bfh-number" id="age" disabled>
            </div>
            <label for="sex" class="col-form-label">Sex</label>
            <div class="form-group col-md-4">
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="Male" disabled> Male       
            </div>
            <div class="form-check form-check-inline">
            </div>
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="Female" disabled> Female
            </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="fincome" class="col-form-label">Family Income (Per Annum)</label>
                <input type="text" class="form-control" id="fincome" disabled>
            </div>
            <label for="caste" class="col-form-label">Caste</label>
            <div class="form-group col-md-3">
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="caste" id="inlineRadio1" value="SC" disabled> SC       
            </div>
            <div class="form-check form-check-inline">
            </div>
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="caste" id="inlineRadio2" value="ST" disabled> ST
            </div>
            <div class="form-check form-check-inline">
            </div>
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="caste" id="inlineRadio2" value="OBC" disabled> OBC
            </div>
            <div class="form-check form-check-inline">
            </div>
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="caste" id="inlineRadio2" value="OC" disabled> OC
            </div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                <img src="" width="150px" height="150px" alt="profile picture">
            </div>
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
                <input type="text" class="form-control" id="type_aid" disabled>
            </div>
            <div class="form-group col-md-3">
                <label for="date" class="col-form-label">Date on which given</label>
                <?php $date1=date("d/m/Y"); ?>
                <input type="text" class="form-control" id="date" placeholder="DD/MM/YY" disabled value="<?php echo $date1; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="total_cost" class="col-form-label">Total Cost of Aid</label>
                <input type="text" class="form-control" id="total_cost">
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
                <label for="subsidy" class="col-form-label">Subsidy Provided</label>
                <input type="text" class="form-control" id="subsidy">
            </div>
            <label for="sex" class="col-form-label">Outstation Beneficiary?</label>
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
                <input type="text" class="form-control" id="OBamt">
            </div>
              
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="paid_expen" class="col-form-label">Board & Lodging expenses</label>
                <input type="text" class="form-control" id="paid_expen">
            </div>
            <div class="form-group col-md-3">
                <label for="total_cost" class="col-form-label">Total to be paid</label>
                <input type="text" class="form-control" id="total_cost">
            </div>
        </div>
        <div class="form-row">
            <br>
            ---------------------------------------------------------------------------------------------------------------------------------
            <br><br>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="days_stayed" class="col-form-label">No.of days stayed</label>
                <input type="text" class="form-control" id="days_stayed">
            </div>
            <div class="form-group col-md-3">
                <label for="last_date" class="col-form-label">Date of Aids last received</label>
                <input type="text" class="form-control" id="last_date" placeholder="DD/MM/YY">
            </div>
        </div>
        <div class="form-row">
            <label for="sex" class="col-form-label">Travel Allowance?</label>
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
                <input type="text" class="form-control" id="TAamt">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="accompanied" class="col-form-label">Accompanied by Escort?</label>
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