  <?php
  date_default_timezone_set('Africa/Lagos');
   $date = date('dmy',time()); 
        $modified_date = date('dmy', strtotime('+1 day'));
       echo  $message = "<font color='red'>$date <br> $modified_date</font>";
       



mysql_connect('localhost','root','') or die(mysql_error());
$select_db = mysql_select_db('canteen attendance');
	if ($select_db) {
		$result = mysql_query("CREATE TABLE x1234(
												id INT(250) NOT NUll AUTO_INCREMENT,
												PRIMARY KEY(id),
												NAME VARCHAR(30),
												age INT)"
											)
			or die(mysql_error());
	}
	if ($result) {
		echo "Good boy";
	}
	else{
		echo "Table x1234 already exists";
	}

 ?>