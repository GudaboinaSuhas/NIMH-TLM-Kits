<?php

session_start();
$connection=mysqli_connect("localhost","root","","nimh") or die("Unable to connect to the database!");

$databasetable = "registration";

set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

include 'PHPExcel/IOFactory.php';

$inputFileName = 'registration_excel.xlsx';

 

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
        $msg = 'Record '.$fname.' already exist ! The record has been ignored <div style="Padding:20px 0 0 0;"></div>';
    }

    }

    echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>".$msg."</div>";
?>