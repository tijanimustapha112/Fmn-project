<?php
	session_start();
	$surname = $_POST['surname'];
	$middlename = $_POST['middlename']; 
	$lastname = $_POST['lastname'];


	$surname = strtoupper($surname);
	$middlename = strtoupper($middlename);
	$lastname = strtoupper($lastname);


	// SELECTING DATABASE
	$connect = mysql_connect('localhost','root','') or die(mysql_error());
	$select_db = mysql_select_db('canteen attendance') or die(mysql_error());

	
	
	
	if (isset($_POST['submit'])) {
		$result = mysql_query("SELECT * FROM 1staffnames WHERE Surname = '$surname' and Middlename = '$middlename' and Lastname = '$lastname' ") or die(mysql_error('unable to select from Table'));
	    $row = mysql_fetch_array($result) or die(mysql_error());


	    if ($row['Surname'] == $surname && $row['Middlename'] == $middlename && $row['Lastname'] == $lastname ) {

	    	//SESSION VARIABLE
	    	$_SESSION['surname'] = $row['Surname'];
	    	$_SESSION['middlename'] = $row['Middlename'];
	    	$_SESSION['lastname'] = $row['Lastname'];
	    	$_SESSION['department'] = $row['Department'];
	    	$_SESSION['division'] = $row['Division'];
	    	$_SESSION['class'] = $row['Class'];
	    	$_SESSION['id'] = $row['Id'];
	    	//echo '<script>
	    	echo "wellcome";
			//alert("Detail correct!");
			//window.location = "./confirm.php";
			//</script>';
		}
		else{
			echo "something wrong";
			//echo '<script>
			//alert("Wrong Detail!");
			//window.location = "./attendance.php";
			//</script>';
		}
			

	}	

	
?>