<?php
    session_start();
	
	// $aadhar = $_POST['aadhar'];
	// $name = $_POST['fname'];
	// $age = $_POST['age'];
	
    $connection=mysqli_connect("localhost","root","","nimh") or die("Unable to connect to the database!");
    
	// $query = "select * from registrations where aadhar='$aadhar'";
	
	// $query2 = mysqli_query($connection,$query);
	

	$sql="select * from registration order by registration_number desc limit 1;";
    $result=mysqli_query($connection,$sql);
	$result=mysqli_fetch_array($result,MYSQLI_ASSOC);
	echo $result['registration_number'];
	
	
	// while($row=mysqli_fetch_array($query2))
	// {
		// $name = $row['fname'];
		// $age = $row['age'];
		
	// }
	/*if(preg_match("/^[1-9]{12}&/",$aadhar))
			 {
				 include 'undertaking.php';
								 
			 }else{
				 
				 include 'undertaking.php';
				echo "<script>	alert('check Aadhar Number');	</script>";
				 
			 }
	*/
	
    
   

?>
