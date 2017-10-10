<?php
ini_set('max_execution_time',0);
ini_set('memory_limit', '-1');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Download Excel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
			->setCellValue('N1', 'Aadhar Number')
			->setCellValue('O1', 'Caste')
			->setCellValue('P1', 'Escort Name');
			
    
			
			
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
							->setCellValue($n1,$row["aadhar"])
							->setCellValue($o1,$row["caste"])
							->setCellValue($p1,$row["escort"]);
			
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


?>


<?php


}
?>

<a href="C://xampp/htdocs/NIMH/download.xls" download>Download</a>
</body>
</html>
