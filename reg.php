<?php
if (isset($_POST['submit'])) {
 $firstname = strtoupper($_POST['firstname']);
 $middlename = strtoupper($_POST['middlename']);
 $lastname = strtoupper($_POST['lastname']);
 $department = strtoupper($_POST['department']);
 $tally_number = $_POST['tally_number'];

    $connect = mysql_connect('localhost','root','') or die(mysql_error());
    $selecet_db = mysql_select_db('canteen attendance') or die(mysql_error());
    if (strlen($tally_number) != 4) {
        $message_tally_number = "Your Tally number should be 4 digit";
    }
    else{
    if ($department == 'Production') {
        $id = 1;
        $division = 'PRODUCTION';
    }
    elseif ($department == 'TECHNICAL') {
        $id = 2;
        $division = 'TECHNICAL';
    }
    elseif ($department == 'SALE') {
        $id = 3;
        $division = 'SALE';
    }
    elseif ($department == 'AGRO') {
        $id = 4;
        $division = 'AGRO';
    }
    elseif ($department == 'HOUSING') {
        $id = 5;
        $division = 'HOUSING';
    }
    elseif ($department == 'FINANCE') {
        $id = 6;
        $division = 'FINANCE';
    }
    elseif ($department == 'GSM') {
        $id = 7;
        $division = 'GSM';
    }
    elseif ($department == 'POLICE') {
        $id = 8;
        $division = 'POLICE';
    }
    elseif ($department == 'SECURITY') {
        $id = 9;
        $division = 'SECURITY';
    }
    elseif ($department == 'VISITOR') {
        $id = 10;
        $division = 'VISITOR';
    }
    elseif($department == 'ENTER DEPARTMENT'){
        $message = "Pls Select your Department";
    }
    $result = mysql_query("SELECT * FROM 1staffnames WHERE TallyNumber = '$tally_number'");
                    $row = mysql_fetch_array($result);
                    $db_tally_number = $row['TallyNumber'];
        if ($db_tally_number == $tally_number) {
            echo "<script>alert('The tally number you enter has been used')</script>"; 
        }
        else{
                $result = mysql_query("INSERT INTO 1staffnames(Surname, Middlename, Lastname,TallyNumber , Department,Division, Class, Id ) VALUES('$firstname' ,'$middlename','$lastname','$tally_number','$department','$division','$department','$id')");
            if ($result) {
                 echo "<script>alert('Registration Sucessfull ')</script>";
            }
            else{
                echo "<script>alert('Unable to insert to table')</script>";
            }
        }
                   
    
        
}
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reg Page</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />	
    <!-- =======================================================
        Theme Name: computerised Canteen
        Author: Tijani
    ======================================================= -->
  <?php

  include 'header.php';

  ?>
	
	<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="index.php">Home</a></li>
				<li>Registration</li>	
                <li><?php echo "$actual_date $actual_time $db_tally_number"; ?></li> 		
			</div>		
		</div>	
	</div>
    </div>
   
   <br>
   <br>
   <br>

    
    <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Register Here</h2>
                <p>Pls make sure your information are corectlly supply</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <div class="col-md-6 col-md-offset-3">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                    <input type="text" name="firstname" class="form-control" id="name" placeholder="Your FirstName" data-rule="minlen:4" data-msg="Please enter your firstname" required="required" />
                                    <div class="validation"></div>
                            </div>
                             <div class="form-group">
                                    <input type="text" name="middlename" class="form-control" id="name" placeholder="Your MiddleName" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required="required" />
                                    <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="lastname" id="email" placeholder="Your LastName" data-rule="email" data-msg="Please enter your lastname" required="required" />
                                    <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                    <select name="department" class="form-control" required="required" placeholder='department' class="validation">
                                        <option>Enter Department</option>
                                        <option>Production</option>
                                        <option>Technical</option>
                                        <option>Sale</option>
                                        <option>Agro</option>
                                        <option>Housing</option>
                                        <option>Finance</option>
                                        <option>GSM</option>
                                        <option>Human Resources</option>
                                        <option>Police</option>
                                        <option>Security</option>
                                        <option>Visitor</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <input type="number" class="form-control" name="tally_number" maxlength="4" rows="5" data-rule="required" data-msg="Please enter your tag number" placeholder="Tag Number" required="required"></input>
                                    <div class="validation" ></div>
                            </div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Details</button></div>
                        <?php echo "<font color='red'>$message <br> $message_tally_number</font>"; ?>
                    </form>                       
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
	
	

    <?php
        include 'footer.php';
    ?>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="js/wow.min.js"></script>
	<script src="js/functions.js"></script>
    
</body>
</html>