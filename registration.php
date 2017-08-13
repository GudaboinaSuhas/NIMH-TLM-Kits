<!DOCTYPE html>
<html lang="en">
<head>  
    <title>TLM Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body style="background-color:grey">
    <div class="container">
        <br>
        <h2 style="text-align:center">NIEPID TLM Kits Registration Form</h2>
        <br>
    </div>
    <div class="container col-md-8">
    <form style="border:1px;border-style:solid;padding:25px;background-color:white;">
        <br>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="fname" class="col-form-label">First Name</label>
                <input type="text" class="form-control" id="fname">
            </div>
            <div class="form-group col-md-4">
                <label for="lname" class="col-form-label">Last Name</label>
                <input type="text" class="form-control" id="lname">
            </div>
            <div class="form-group form-control-sm col-md-2">
                <label for="picture">Upload Picture</label>
                <input type="file" class="form-control-file" id="picture">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="age" class="col-form-label">Age</label>
                <input type="text" class="form-control bfh-number" id="age">
            </div>
            <label for="sex" class="col-form-label">Sex</label>
            <div class="form-group col-md-4">
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="Male"> Male       
            </div>
            <div class="form-check form-check-inline">
            </div>
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="Female"> Female
            </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="address" class="col-form-label">Address</label>
                <textarea type="text" rows="3" cols="7" class="form-control" id="address"></textarea>
            </div>
            <div class="form-group col-md-3">
                <label for="village" class="col-form-label">Village</label>
                <input type="text" class="form-control" id="village" placeholder="Village/Taluka/Mandal">
            </div>
            <div class="form-group col-md-3">
                <label for="district" class="col-form-label">District</label>
                <input type="text" class="form-control" id="district">
            </div>
            <div class="form-group col-md-3">
                <label for="state" class="col-form-label">State</label>
                <input type="text" class="form-control" id="state">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="guardian's name'" class="col-form-label">Guardian's Name</label>
                <input type="text" class="form-control" id="gname" placeholder="Father/Mother/Guardian Name">
            </div>
            <div class="form-group col-md-3">
                <label for="phone" class="col-form-label">Phone No</label>
                <input type="text" class="form-control" id="phone">
            </div>
            <div class="form-group col-md-3">
                <label for="fincome" class="col-form-label">Family Income (Per Annum)</label>
                <input type="text" class="form-control" id="fincome">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="level" class="col-form-label">Diagnosis & Level of ID</label>
                <input type="text" class="form-control" id="level">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="aadhar" class="col-form-label">Aadhar Number</label>
                <input type="text" class="form-control" id="aadhar">
            </div>
            <label for="caste" class="col-form-label">Caste</label>
            <div class="form-group col-md-3">
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="caste" id="inlineRadio1" value="SC"> SC       
            </div>
            <div class="form-check form-check-inline">
            </div>
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="caste" id="inlineRadio2" value="ST"> ST
            </div>
            <div class="form-check form-check-inline">
            </div>
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="caste" id="inlineRadio2" value="OBC"> OBC
            </div>
            <div class="form-check form-check-inline">
            </div>
            <div class="form-check form-check-inline">
                <br><br>
                <input class="form-check-input" type="radio" name="caste" id="inlineRadio2" value="OC"> OC
            </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="escort" class="col-form-label">Escort's Name(optional)</label>
                <input type="text" class="form-control" id="escort" placeholder="Father/Mother/Guardian Name">
            </div>
            <div class="form-group col-md-3">
                <label for="phone" class="col-form-label">Phone No</label>
                <input type="text" class="form-control" id="phone">
            </div>
            <div class="form-group form-control-sm col-md-4">
                <label for="esc_pic">Upload Escort's Proof(any)</label>
                <input type="file" class="form-control-file" id="esc_pic">
            </div>
        </div>
        <div class="form-row">   
            <div class="form-group form-control-sm col-md-4">
                <label for="proof1">Upload Aadhar Proof</label>
                <input type="file" class="form-control-file" id="a_proof">
            </div>
            <div class="form-group form-control-sm col-md-4">
                <label for="proof2">Upload Disability form</label>
                <input type="file" class="form-control-file" id="d_proof">
            </div>
            <div class="form-group form-control-sm col-md-4">
                <label for="proof3">Upload BPL(Tahsildar) / Income Certificate</label>
                <input type="file" class="form-control-file" id="i_proof">
            </div> 
        </div>
        
        <div class="form-group">
            <br>
            <input class="btn btn-primary" type="submit" name="submit" value="Register">    
        </div>
        
    </form>
</div>   
<br>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>