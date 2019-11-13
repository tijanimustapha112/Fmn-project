<!DOCTYPE html>
<html>
<head>
	<title>convert to excel</title>
</head>
<body>
		<form action="" method="POST">
			<input type="submit" name="submit" value="Click...">
		</form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
$dbhost= "localhost"; //your MySQL Server 
$dbuser = "root"; //your MySQL User Name 
$dbpass = ""; //your MySQL Password 
$dbname = "canteen attendance"; 
//your MySQL Database Name of which database to use this 
$tablename = "recordtable"; //your MySQL Table Name which one you have to create excel file 

$conncet = mysql_connect('Localhost','root','') or die(mysql_error());
$select_db = mysql_select_db('canteen attendance') or die(mysql_error());

$query ="SELECT * FROM recordtable";
// Execute the database query
$result = mysql_query($query)or die(mysql_error());

// Instantiate a new PHPExcel object
$objPHPExcel = newPHPExcel('');
// Set the active Excel worksheet to sheet 0
$objPHPExcel->setActiveSheetIndex(0);
// Initialise the Excel row number
$rowCount=1;
// Iterate through each result from the SQL query in turn
// We fetch each database result row into $row in turn
while($row =mysql_fetch_array($result)){
// Set cell An to the "name" column from the database (assuming you have a column called name)
//    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['name']);
// Set cell Bn to the "age" column from the database (assuming you have a column called age)
//    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['age']);
// Increment the Excel row counter
    $rowCount++;
}

// Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
$objWriter=newPHPExcel_Writer_Excel2007($objPHPExcel);
// Write the Excel file to filename some_excel_file.xlsx in the current directory
$objWriter->save('some_excel_file.xlsx');
}
?>