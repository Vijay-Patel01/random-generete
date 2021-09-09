<?php
session_start();
$con=mysqli_connect("localhost","root","","exam");
if(isset($_POST['submit'])) {
	if(isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "") {
		$allowedExtensions = array("xls","xlsx");
		$ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);

		if(in_array($ext, $allowedExtensions)) {
				// Uploaded file
			$file = "uploads/".$_FILES['uploadFile']['name'];
			$isUploaded = copy($_FILES['uploadFile']['tmp_name'], $file);
			   // check uploaded file
			if($isUploaded) {
					// Include PHPExcel files and database configuration file
				// include("db.php");
				
				$mysqli=new mysqli("localhost","root","","exam");
				require_once __DIR__ . '/vendor/autoload.php';
				include(__DIR__ .'/vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php');
				try {
				// load uploaded file
					$objPHPExcel = PHPExcel_IOFactory::load($file);
				} catch (Exception $e) {
					die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
				}

		// Specify the excel sheet index
				$sheet = $objPHPExcel->getSheet(0);
				$total_rows = $sheet->getHighestRow();
				$highestColumn = $sheet->getHighestColumn();	
				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);		

		//	loop over the rows
				for ($row = 2; $row <= $total_rows; ++ $row) {
					for ($col = 0; $col < $highestColumnIndex; ++ $col) {
						$cell = $sheet->getCellByColumnAndRow($col, $row);
						$val = $cell->getValue();
						$records[$row][$col] = $val;
					}
				}
				$mysqli->query($query);
				foreach($records as $row){
					$question = isset($row[0]) ? $row[0] : '';
					$marks = isset($row[1]) ? $row[1] : '';
					$level = isset($row[2]) ? $row[2] : '';
					$subject = $_POST['subject'];
	// Insert into database
					$query = "INSERT INTO student (question,marks,level,subject) 
					values('".$question."','".$marks."','".$level."','".$subject."')";
					$mysqli->query($query);		
				}

				$chk=unlink($file);
				if($chk)
				{	
					$_SESSION['disp_msg']="Questions uploaded Successfully";
					header("Location:upload_question.php"); 
				}
			} else {
				echo '<span class="msg">File not uploaded!</span>';
			}
		} else {
			echo '<span class="msg">Please upload excel sheet.</span>';
		}
	} else {
		echo '<span class="msg">Please upload excel file.</span>';
	}
}
?>