<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Computer base Attendance</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />	
    <!-- =======================================================
        Theme Name: illuminator
        Author: Mustapha
    ======================================================= -->

  <body>
	<?php
		include 'header.php';
	?>
	<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="index.php">Home</a></li>
				<li>Statistics</li>	
				<li><?php echo "$actual_date $actual_time"; ?></li>		
			</div>		
		</div>	
	</div>
	
	<div class="services">
		<div class="container">
			<h3>Statistics Report</h3>
			<hr>
			
			<div class="col-md-6">
				<div class="media">
					<ul>
						<li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Report for Today: (<?php echo "$actual_date"; ?>)</h4>
									<?php
										$db = mysql_connect("localhost", "root");
										mysql_select_db("canteen attendance",$db);
										echo "<font color='green'><table border=3 width='100%'>\n</font>";
										echo "<tr><td width='400px' align='Left'><b>Department<b></td><td width='400px' align='center'><b>Number<b></tr>\n";
										echo "</table>\n";

										$id = 1;
										$sum = 0;
										if (!$result = mysql_query("SELECT * FROM $real_date WHERE id = $id",$db)) {
											echo '<script>
                                    			alert("Table Not Created, Click on SETUP TABLE in Home page to Creat table!");
                                    			window.location = "./index.php";
                                				</script>';
										}
										else{
										while ($id <= 10) {
											$count = 0;
											$result = mysql_query("SELECT * FROM $real_date WHERE id = $id",$db);
											while ($myrow = mysql_fetch_row($result)) {
												$class = $myrow[4];
												$count = $count + 1;
												}
												if ($count > 0) {
												echo "<table border=1>\n
													  <tr>
														<td width='5%' align='Left'>$class</td>
														<td width='6%' align='center'>$count</td>
													  </tr>
													 </table>\n";
													 $sum = $sum + $count;
												}
												
												$id = $id + 1;
			}
		}
											  echo "<table border=1>\n
											  <tr>
											  <td width='6%' align='center'> <b>Total</b></td>
								   			  <td width='6%' align='center'><b>$sum<b></td>
											  </tr>
											  </table>\n";
		?>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
				
	
	<div class="sub-services">
		<div class="container">
			<div class="col-md-6">
				<form action="" method="post"  role="form" class="contactForm">
						<table border="0" align="center">
							<tr>
								<td>
									Select department:
								</td>
								<td>
						<select name="department" required="required">
							<option></option>
							<option>All</option>
							<option>1Production</option>
							<option>2Technical</option>
							<option>3Sale</option>
							<option>4Agro</option>
							<option>5Housing</option>
							<option>6Finance</option>
							<option>7G.S.M.</option>
							<option>8Police</option>
							<option>9Security</option>
							<option>10Visitor</option>
						</select>
								</td>
							</tr>
							<tr>
							<tr>
								<td>
									Day:
								</td>
								<td>
									<select name="day" required="required">
							<option></option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
							<option>24</option>
							<option>25</option>
							<option>26</option>
							<option>27</option>
							<option>28</option>
							<option>29</option>
							<option>30</option>
							<option>31</option>
						</select>
								</td>
							</tr>
							<tr>
								<td>
									Month:
								</td>
								<td>
									<select name="month" required="required">
										<option></option>
										<option>01</option>
										<option>02</option>
										<option>03</option>
										<option>04</option>
										<option>05</option>
										<option>06</option>
										<option>07</option>
										<option>08</option>
										<option>09</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									Year:
								</td>
								<td>
									<select name="year" required="required">
									<option>19</option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="submit" value="Detail of Statistics"></td>
							</tr>
						</table>
					</div>
				</form>

				<div class="media">
					<ul>
						<li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Each Staff in a Department</h4>
								<p> 


<?php
					if (isset($_POST['submit'])) {
						mysql_connect('localhost','root','') or die(mysql_error());
						mysql_select_db('canteen attendance') or die(mysql_error());
							$department = $_POST['department'];
							$day = $_POST['day'];
							$month = $_POST['month'];
							$year = $_POST['year'];
							$date = "$day$month$year";
						    
							
			if ($department == 'All') {
					$department = array('1production', '2technical', '3sale', '4agro', '5housing', '6Finance', '7gsm', '8police', '9Security', '10visitor' );
				for ($i=0; $i <= 9; $i++) {
					echo '<br>';
					$result = mysql_query("SELECT * FROM $department[$i] WHERE Dater = $date")or 
									die(mysql_error( 'Date not found in the database'));
						if ($result) {
							echo "<table border='2'align='center'>
								<tr>
									<td><font size='3px'><b>Department:</b></font></td>
									<td><font size='3px'><b>$department[$i]</b></font></td>
								</tr>";
								while ($row = mysql_fetch_array($result)) {
									$timer = $row['Timer'];
									$name = $row['Name'];
									echo "
										<tr>
											<td>$name</td><td>$timer<br></td>
										</tr>
										</table>";
									}
						}
				}
			}
			else{
				if ($result = mysql_query("SELECT * FROM $department WHERE Dater = $date")) {
					echo  "<table border='2' align='center'>
							<tr>
							<td><font size='3px'><b>Department:</b></font></td>
							<td><font size='3px'><b>$department</b></font></td>
							</tr>";
					while ($row = mysql_fetch_array($result)) {
							$timer = $row['Timer'];
							$name = $row['Name'];
						echo  "<table border='1' align='center'>
							<tr>
							<td>$name</td><td>$timer<br></td>
							</tr>
						 	</table>";
						
					}
				}
				else{
					echo "No Staff Name is recorded";
				}
				
					
				
			}
}
?>

								</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	
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