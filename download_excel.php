<?php
	ini_set('max_execution_time',0);
	ini_set('memory_limit', '-1');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Download Excel</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<style> 
        body {
            background-image: url("1.jpg");
            background-color: #cccccc;
        }
    	</style>
	</head>

	<body>
		<?php
			generate_excel();

			function generate_excel()
			{
				mysql_connect("localhost","root","");
				mysql_select_db("nimh");

				/** Error reporting */
				if (PHP_SAPI == 'cli')
					die('This example should only be run from a Web Browser');

				/** Include PHPExcel */
				require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


				// Create new PHPExcel object
				$objPHPExcel = new PHPExcel();


				// Set document properties
				$objPHPExcel->getProperties()->setCreator("Suhas")
											->setLastModifiedBy("Suhas")
											->setTitle("extract data")
											->setSubject("extract data")
											->setDescription("extract data")
											->setKeywords("extract data")
											->setCategory("extract data");
											
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A1', 'Registration Number')
							->setCellValue('B1', 'First Name')
							->setCellValue('C1', 'Last Name')
							->setCellValue('D1', 'Age')
							->setCellValue('E1', 'Sex')
							->setCellValue('F1', 'Address')
							->setCellValue('G1', 'Village')
							->setCellValue('H1', 'District')
							->setCellValue('I1', 'State')
							->setCellValue('J1', 'Guardian Name')
							->setCellValue('K1', 'Phone')
							->setCellValue('L1', 'Family Income')
							->setCellValue('M1', 'Disability Level')
							->setCellValue('N1', 'Recommended Kit')
							->setCellValue('O1', 'Aadhar Number')
							->setCellValue('P1', 'Caste')
							->setCellValue('Q1', 'Escort Name')
							->setCellValue('R1', 'Date Given')
							->setCellValue('S1', 'Cost')
							->setCellValue('T1', 'Total');
		
						
							$res=mysql_query("SELECT * FROM registration");
							$a=2;
							while($row=mysql_fetch_array($res))
							{
											$a=$a+1;
											$a1='A'.$a;
											$b1='B'.$a;
											$c1='C'.$a;
											$d1='D'.$a;
											$e1='E'.$a;
											$f1='F'.$a;
											$g1='G'.$a;
											$h1='H'.$a;
											$i1='I'.$a;
											$j1='J'.$a;
											$k1='K'.$a;
											$l1='L'.$a;
											$m1='M'.$a;
											$n1='N'.$a;
											$o1='O'.$a;
											$p1='P'.$a;
											$q1='Q'.$a;
											$r1='R'.$a;
											$s1='S'.$a;
											$t1='T'.$a;
											

											$objPHPExcel->setActiveSheetIndex(0)
											->setCellValue($a1,$row["registration_number"])
											->setCellValue($b1,$row["fname"])
											->setCellValue($c1,$row["lname"])
											->setCellValue($d1,$row["age"])
											->setCellValue($e1,$row["sex"])
											->setCellValue($f1,$row["address"])
											->setCellValue($g1,$row["village"])
											->setCellValue($h1,$row["district"])
											->setCellValue($i1,$row["state"])
											->setCellValue($j1,$row["gname"])
											->setCellValue($k1,$row["phone"])
											->setCellValue($l1,$row["fincome"])
											->setCellValue($m1,$row["level"])
											->setCellValue($n1,$row["Recommended_Kit"])
											->setCellValue($o1,$row["aadhar"])
											->setCellValue($p1,$row["caste"])
											->setCellValue($q1,$row["escort"])
											->setCellValue($r1,$row["date_given"])
											->setCellValue($s1,$row["cost"])
											->setCellValue($t1,$row["total_paid"]);
	
							}
							
					// Rename worksheet
				$objPHPExcel->getActiveSheet()->setTitle('Simple');
				// Set active sheet index to the first sheet, so Excel opens this as the first sheet
				$objPHPExcel->setActiveSheetIndex(0);
				// Redirect output to a client�s web browser (Excel5)

				/*header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment;filename="registered_list.xls"');
				header('Cache-Control: max-age=0');
				header('Cache-Control: max-age=1');

				header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
				header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
				header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
				header ('Pragma: public'); // HTTP/1.0

				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
				$objWriter->save('php://output');
				exit;*/

				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
				$objWriter->save('download.xls');

			}
		?>
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
			<h2 style="text-align:center;color:white">NIEPID TLM Kits Registered People List</h2>
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
					<a class="btn btn-primary" href="download.xls" download>Download</a>    
				</div>
				
			</form>
		</div>   
		<br>	


		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	</body>
</html>
