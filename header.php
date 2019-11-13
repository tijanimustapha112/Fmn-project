	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CONPUTER BASE ATTENDANCE</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />
   
  </head>
	<header>		 <nav class="navbar navbar-default navbar-fixed-top"
	role="navigation"> <div class="navigation"> <div class="container">					 <div
	class="navbar-header"> <button type="button" class="navbar-toggle collapsed"
	data-toggle="collapse" data-target=".navbar-collapse.collapse"> <span
	class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
	class="icon-bar"></span> <span class="icon-bar"></span> </button> <div
	class="navbar-brand"> <a href="index.html"><img src="images/slider/logo.jpg" height="50px" ></h1></a>
	</div> </div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="index.php" class="active">Home</a></li>
								<li role="presentation"><a href="attendance.php">Attendance</a></li>
								<li role="presentation"><a href="statistics.php">Statistics</a></li>			
								 <li role="presentation"><a href="reg.php">REGISTRATION</a></li>
								<li role="presentation"><a href="about.php">ABOUT</a></li> 					
							</ul>
						</div>
					</div>						
				</div>
			</div>	
		</nav>		
	</header>
	<?php
	session_start();
    date_default_timezone_set("Africa/Lagos");
	$time = time();
    $actual_date = date('D:d:M:y', $time);
    $actual_time = date('h:i:s', $time);
    $db_date = date('dmy', $time);
    $real_date = date('D_d_m_Y', $time); 
?>

