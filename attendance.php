<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance Page</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />	
    <!-- =======================================================
        Theme Name: Attendance
        Author: Mustapha
    ======================================================= -->
  </head>
  <body color='red'>
	
	
	<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="index.php">Home</a></li>
				<li>Attendance</li>	
                <li><?php echo "$actual_date $actual_time"; ?></li>		
			</div>		
		</div>	
	</div>
          <!-- <marquee><img src="images/slider/img5.jpeg" height="200px"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<img src="images/img3.jpg" height="200px"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<img src="images/img4.jpeg" height="200px"></marquee>
          -->
	
	<section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2></h2>
               <p> <font color='green' size="4px"> <b>PLACE YOUR CARD </b>  <b> AT THE SCANNER</b>
                                </font></p>
            </div>
            <p>
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <div class="col-md-6 col-md-offset-3">
                    
                    <form action="" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                    <input type="text" name="TallyNumber" class="form-control" id="name" placeholder="Scan Your card" data-rule="minlen:4" data-msg="Scan Your card" required="required"  maxlength="13 " autofocus="autofocus" />
                            </div>
                        <div class="text-center"><input type="submit" name="submit" value="SCAN" class="btn btn-primary btn-lg"></input>
                        </div>
                    </form>
                    <table>
                        <tr>
                            <td colspan=""></td>
                        </tr>                    </table>
                
                    
                    
<?php
session_start();
$conncet = mysql_connect('Localhost','root','') or die(mysql_error());
$select_db = mysql_select_db('canteen attendance') or die(mysql_error());
$TallyNumber = $_POST['TallyNumber'];
$submit = $_POST['submit'];

if (isset($submit)) {
    $result = mysql_query("SELECT * FROM 1staffnames WHERE TallyNumber = '$TallyNumber' ") or die(mysql_error('unable to select from Table'));
    if ($result) {
        $row = mysql_fetch_array($result); 
        if ($row) {
            //Session variable
            $_SESSION['surname'] = $row['Surname'];
            $_SESSION['middlename'] = $row['Middlename'];
            $_SESSION['lastname'] = $row['Lastname'];
            $_SESSION['department'] = $row['Department'];
            $_SESSION['division'] = $row['Division'];
            $_SESSION['class'] = $row['Class'];
            $_SESSION['id'] = $row['Id'];
            $_SESSION['tallynumber'] = $row['TallyNumber'];

            //Main variable
            $surname = $_SESSION['surname'];
            $surname = $_SESSION['surname'];
            $middlename = $_SESSION['middlename'];
            $lastname = $_SESSION['lastname'];
            $department = $_SESSION['department'];
            $division = $_SESSION['division'];
            $class = $_SESSION['class'];
            $id = $_SESSION['id'];
            $name = $surname.' '.$middlename.' '.$lastname;

                //insert into table if it is available
            //Checking if card has being used before
            
            if ($result = mysql_query("SELECT * FROM $real_date WHERE Names = '$name'")) {
                   $row = mysql_fetch_array($result);
                    $name_db = $row['Names'];
                    echo $time = $row['Timer'];
                    if ($name_db == $name) {
                         echo "<script> alert('card already used.')</script>";  
                }
                    else{
                    // Insert Information into todays "$real_date" table.
                    $result = mysql_query("INSERT INTO $real_date(Names, Department, Division, Class, Id, Timer)VALUES ('$surname $middlename $lastname', '$department', '$division', '$class', '$id', '$actual_date @ $actual_time')") or die(mysql_error()); 

                        //Inserting into department table
                         $result = mysql_query("INSERT INTO $id$class(Name, Dater, Timer) VALUES('$surname $middlename $lastname', '$db_date', '$actual_time')") or die(mysql_error());


                      //Table creation     
                        $message = "<table align='center' border='1' height='200' wight='300'>
                                <tr>
                                    <td><font color='green' size='10'><b>NAME:</b></font><td>
                                    <td colspan=''><font color='green' size='8'><b>$name</b></font></td>
                                </tr>
                                <tr>
                                    <td><font color='green' size='10'><b>DIVISION:</b></font></td>
                                    <td colspan='3'><font color='green' size='8'><b>$division</b></font></td>
                                </tr>
                                <tr>
                                    <td><font color='green' size='10'><b>DEPARTMENT: &nbsp</b></font></td>
                                    <td colspan='3'><font color='green' size='5'><b>$department</b></font></td>
                                </tr>
                                <tr>
                                    <td><font color='green' size='10'><b>CLASS: &nbsp</b></font></td>
                                    <td colspan='3'><font color='green' size='5'><b>$class</b></font></td>
                                </tr>
                            </table>";
                        
                    }          
            }

            //if table is not created, creat table and insert
            else{
                $result = mysql_query("CREATE TABLE $real_date(
                                                        Sn INT(250) NOT NUll AUTO_INCREMENT,
                                                        PRIMARY KEY(Sn),
                                                        Names VARCHAR(30),
                                                        Department VARCHAR(30),
                                                        Division VARCHAR(30),
                                                        Class VARCHAR(30),
                                                        Tally VARCHAR(30),
                                                        Id INT(250),
                                                        Timer VARCHAR(30),
                                                        Food VARCHAR(30))"
                                                    );
                $row = mysql_fetch_array($result);
                    $name_db = $row['Names'];
                    echo $time = $row['Timer'];
                    if ($name_db == $name) {
                         echo "<script> alert('card already used.')</script>";  
                }
                    else{
                    // Insert Information into todays "$real_date" table.
                    $result = mysql_query("INSERT INTO $real_date(Names, Department, Division, Class, Id, Timer)VALUES ('$surname $middlename $lastname', '$department', '$division', '$class', '$id', '$actual_date @ $actual_time')") or die(mysql_error()); 

                        //Inserting into department table
                         $result = mysql_query("INSERT INTO $id$class(Name, Dater, Timer) VALUES('$surname $middlename $lastname', '$db_date', '$actual_time')") or die(mysql_error());


                      //Table creation     
                        $message = "<table align='center' border='1' height='200' wight='300'>
                                <tr>
                                    <td><font color='green' size='10'><b>NAME: &nbsp</b></font><td>
                                    <td colspan='3'><font color='green' size='8'><b>$name</b></font></td>
                                </tr>
                                <tr>
                                    <td><font color='green' size='10'><b>DIVISION: &nbsp</b></font></td>
                                    <td colspan='3'><font color='green' size='8'><b>$division</b></font></td>
                                </tr>
                                <tr>
                                    <td><font color='green' size='10'><b>DEPARTMENT: &nbsp</b></font></td>
                                    <td colspan='3'><font color='green' size='5'><b>$department</b></font></td>
                                </tr>
                                <tr>
                                    <td><font color='green' size='10'><b>CLASS: &nbsp</b></font></td>
                                    <td colspan='3'><font color='green' size='5'><b>$class</b></font></td>
                                </tr>
                            </table>";
                        
                    }          
            }                 


                            }
                            else{
                            echo '<script>
                                    alert("Invalid card!");
                                    window.location = "./attendance.php";
                                </script>';
                            }
                        }
                        
                    }
                   ?>
                    
                                 
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->


    <?php echo "$message"; ?>
     <?php include 'footer.php'; ?>
                    
	
    
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="js/wow.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="js/functions.js"></script>
    <script src="contactform/contactform.js"></script>
    
</body>
</html>
