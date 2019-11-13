<?php
	echo "<font color='green'>";
	session_start();
	date_default_timezone_set("Africa/Lagos");
	$time = time();
    $actual_date = date('D:d:M:y', $time);
    $actual_time = date('h:i:s', $time);
    $db_date = date('dmy', $time);
    $real_date = date('D_d_m_Y', $time);		
			$surname = $_SESSION['surname'];
			$middlename = $_SESSION['middlename'];
			$lastname = $_SESSION['lastname'];
			$department = $_SESSION['department'];
			$division = $_SESSION['division'];
			$class = $_SESSION['class'];
			$id = $_SESSION['id'];
			$tallynumber = $_SESSION['tallynumber'];
			$name = $surname.' '.$middlename.' '.$lastname;
			$meat = $_POST['meat'];
			$fruit = $_POST['fruit'];
			$drink = $_POST['drink'];
if (isset($_POST['submit'])) {
				mysql_connect('localhost','root','') or die(mysql_error());
			 	mysql_select_db('canteen attendance') or die(mysql_error());
				
			if ($result = mysql_query("SELECT * FROM $real_date WHERE Names = '$name'")) {
				$result = mysql_query("SELECT * FROM $real_date WHERE Names = '$name'")or die(mysql_error('unable to select from Table'));
                    $row = mysql_fetch_array($result);
                    $name_db = $row['Names'];
                    $time = $row['Timer'];

               if ($name_db == $name) {
               	echo "<script>alert('this tally number has being used today: $time');
               						window.location = './attendance.php' </script>";
                }
					else{
						$result = mysql_query("INSERT INTO $real_date(Names, Department, Division, Class, Tally, Id, Timer, Food)
						VALUES ('$surname $middlename $lastname', '$department', '$division', '$class','$tallynumber', '$id', '$actual_date @ $actual_time','$meat $fruit $drink')") or die(mysql_error());
					if (isset($result)) {
						$result = mysql_query("INSERT INTO $id$class(Name, Dater, Timer) VALUES('$surname $middlename $lastname', '$db_date', '$actual_time')") or die(mysql_error());
								echo '<script>
	                                    alert("Attendance taken Sucessfully!");
	                                    window.location = "./attendance.php";
	                                </script>';
					}
					else{
						echo "unable to insert into department db";
					}
				}
			}
			else{
				echo '<script>
	                    alert("Table not created, CLick SETUP TABLE in home page to creat table!");
	                    window.location = "./index.php";
	                   </script>';
							}
			}



		?>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstraps.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/stylee.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/fonts-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>

	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h1 >WELLCOME:</h1>
		<h2><?php echo" $surname $middlename $lastname"; ?></h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true"><?php echo"$division"; ?></a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours"><?php echo"$department"; ?></a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
<?php

	if (isset($_POST['rice'])) {
		$message_rice = "<form action='' method='post'>
						<fieldset>
						<ul>
							<li>
							<label for='meat'> Meat </label>
							<input type='Checkbox' name='meat'  id='meat' value='meat' /> 
							<img src='images/12_meat.jpg' width='50px' height='50px' >
							</li>
						
						
							<li>
							<label for='fish'> Fruit  </label>
							<input type='Checkbox' name='fruit'  id='fruit' value='fruit' /> 
							<img src='images/9_fruit.jpg' width='50px' height='50px' >
							</li>
						
						<li>
							<label for='rice'> Drink  </label>
							<input type='Checkbox' name='drink'  id='drink' value='drink' /> 
							<img src='images/drink.png' width='50px' height='50px' >
						</li>
						</ul>
								<input type='submit' name='submit' value='Confirm' class='btn btn-primary btn-lg'>
						</fieldset>
					</form>";
		
	}		
	?>		
				
	<div class="agile_top_brands_grids">

		<div class="col-md-4 top_brand_left">
			<div class="hover14 column">
				<div class="agile_top_brand_left_grid">
					<div class="agile_top_brand_left_grid_pos">
						<img src="images/available.jpg" alt=" " class="img-responsive" />
						</div>
							<div class="agile_top_brand_left_grid1">
									<figure>
		<div class="snipcart-item block" >
			<div class="snipcart-thumb">
				<a href="products.html"><img title=" " alt="rice" src="images/1.jpg" width="90%" height="24%" /></a>		
					<p>Rice</p>
					<div class="stars">
						<i class="fa fa-star blue-star" aria-hidden="true"></i>
						<i class="fa fa-star blue-star" aria-hidden="true"></i>
						<i class="fa fa-star blue-star" aria-hidden="true"></i>
						<i class="fa fa-star blue-star" aria-hidden="true"></i>
						<i class="fa fa-star gray-star" aria-hidden="true"></i>
					<div class="snipcart-details top_brand_home_details">
						<form action="" method="post">
						<fieldset>
						<input type="submit" name="rice" value="Select" class="button" />
						</fieldset>
						</form>
				</div>
					</div>
					</div>
			</div>
			<?php

echo "$message_rice";

?>
		</figure>
	</div>
</div>
</div>

</div>
<?php
if (isset($_POST['swallor'])) {
		$message_swallor = "<form action='' method='post'>
						<fieldset>
						<ul>
							<li>
							<label for='meat'> Meat </label>
							<input type='Checkbox' name='meat'  id='meat' value='meat' /> 
							<img src='images/12_meat.jpg' width='50px' height='50px' >
							</li>
						
						
							<li>
							<label for='fish'> Fruit  </label>
							<input type='Checkbox' name='fruit'  id='fruit' value='fruit' /> 
							<img src='images/9_fruit.jpg' width='50px' height='50px' >
							</li>
						
						<li>
							<label for='rice'> Drink  </label>
							<input type='Checkbox' name='drink'  id='drink' value='drink' /> 
							<img src='images/drink.png' width='50px' height='50px' >
						</li>
						</ul>
								<input type='submit' name='submit' value='Confirm' class='btn btn-primary btn-lg'>
						</fieldset>
					</form>";
	}		
?>
	<div class="col-md-4 top_brand_left">
		<div class="hover14 column">
			<div class="agile_top_brand_left_grid">
				<div class="agile_top_brand_left_grid_pos">
				<img src="images/available.jpg" alt=" " class="img-responsive" />
				</div>
				<div class="agile_top_brand_left_grid1">
				<figure>
					<div class="snipcart-item block" >
						<div class="snipcart-thumb">
						<a href="products.html"><img title=" " alt=" " src="images/2.jpg" width="90%" height="24%"/></a>		
						<p>Swallor</p>
							<div class="stars">
								<i class="fa fa-star blue-star" aria-hidden="true"></i>
								<i class="fa fa-star blue-star" aria-hidden="true"></i>
								<i class="fa fa-star blue-star" aria-hidden="true"></i>
								<i class="fa fa-star blue-star" aria-hidden="true"></i>
								<i class="fa fa-star gray-star" aria-hidden="true"></i>
							</div>
								<h4 hidden="hidden">#2000.99 <span>#3500.00</span></h4>
						</div>
						<div class="snipcart-details top_brand_home_details">
						<form action="" method="post">
						<fieldset>
						
						<input type="submit" name="swallor" value="Select" class="button" />

						</fieldset>
						</form>

				</div>
			</div>
			<?php

echo "$message_swallor";

?>
		</figure>
	</div>
</div>
</div>
</div>
<?php

	if (isset($_POST['poorage'])) {
	$message_poorage = "<form action='' method='post'>
						<fieldset>
						<ul>
							<li>
							<label for='meat'> Meat </label>
							<input type='Checkbox' name='meat'  id='meat' value='meat' /> 
							<img src='images/12_meat.jpg' width='50px' height='50px' >
							</li>
						
						
							<li>
							<label for='fish'> Fruit  </label>
							<input type='Checkbox' name='fruit'  id='fruit' value='fruit' /> 
							<img src='images/9_fruit.jpg' width='50px' height='50px' >
							</li>
						
						<li>
							<label for='rice'> Drink  </label>
							<input type='Checkbox' name='drink'  id='drink' value='drink' /> 
							<img src='images/drink.png' width='50px' height='50px' >
						</li>
						</ul>
								<input type='submit' name='submit' value='Confirm' class='btn btn-primary btn-lg'>
						</fieldset>
					</form>";
		
	}		
	?>		
	<div class="col-md-4 top_brand_left">
		<div class="hover14 column">
			<div class="agile_top_brand_left_grid">
				<div class="agile_top_brand_left_grid_pos">
					<img src="images/available.jpg" alt=" " class="img-responsive" />
					</div>
						<div class="agile_top_brand_left_grid1">
												<figure>
							<div class="snipcart-item block">
								<div class="snipcart-thumb">
								<a href="products.html"><img src="images/3.jpg" alt=" " class="img-responsive" width="90%" height="24%"/></a>
								<p>Poorage</p>
															<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
															<h4 hidden="hidden">#4000.99 <span>#6500.00</span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
															<form action="#" method="post">
																<fieldset>
																	<input type="submit" name="poorage" value="Select" class="button" />
																</fieldset>
															</form>
														</div>
													</div>
<?php

echo "$message_poorage";

?>
												</figure>
											</div>
										</div>
									</div>
								</div>
<?php

	if (isset($_POST['fruit'])) {
		$message_fruit = "<form action='' method='post'>
						<fieldset>
						<ul>
							<li>
							<label for='meat'> Meat </label>
							<input type='Checkbox' name='meat'  id='meat' value='meat' /> 
							<img src='images/12_meat.jpg' width='50px' height='50px' >
							</li>
						
						
							<li>
							<label for='fish'> Fruit  </label>
							<input type='Checkbox' name='fruit'  id='fruit' value='fruit' /> 
							<img src='images/9_fruit.jpg' width='50px' height='50px' >
							</li>
						
						<li>
							<label for='rice'> Drink  </label>
							<input type='Checkbox' name='drink'  id='drink' value='drink' /> 
							<img src='images/drink.png' width='50px' height='50px' >
						</li>
						</ul>
								<input type='submit' name='submit' value='Confirm' class='btn btn-primary btn-lg'>
						</fieldset>
					</form>";
		
	}		
	?>		

<div class="clearfix"> </div>
</div>
	<div class="agile_top_brands_grids">
		<div class="col-md-4 top_brand_left">
		<div class="hover14 column">
		<div class="agile_top_brand_left_grid">
		<div class="agile_top_brand_left_grid_pos">
			<img src="images/available.jpg" alt=" " class="img-responsive" />
				</div>
			<div class="agile_top_brand_left_grid1">
				<figure>
				<div class="snipcart-item block" >
				<div class="snipcart-thumb">
				<a href="products.html"><img title=" " alt=" " src="images/4.jpg" width="90%" height="24%"/></a>		
				<p>Bread and Beans</p>
					<div class="stars">
					<i class="fa fa-star blue-star" aria-hidden="true"></i>
					<i class="fa fa-star blue-star" aria-hidden="true"></i>
					<i class="fa fa-star blue-star" aria-hidden="true"></i>
					<i class="fa fa-star blue-star" aria-hidden="true"></i>
					<i class="fa fa-star gray-star" aria-hidden="true"></i>
				</div>
					<h4 hidden="hidden">#3500.99 <span>#5500.00</span></h4>
			</div>
<div class="snipcart-details top_brand_home_details">
	<form action="#" method="post">
		<fieldset>
		<input type="submit" name="fruit" value="Select" class="button" />
		</fieldset>
		</form>
</div>
	</div>
	<?php

echo "$message_fruit";

?>
</figure>
</div>
</div>
</div>
</div>
<?php

	if (isset($_POST['Parryss_sugar'])) {
	$message_sugar = "<form action='' method='post'>
						<fieldset>
						<ul>
							<li>
							<label for='meat'> Meat </label>
							<input type='Checkbox' name='meat'  id='meat' value='meat' /> 
							<img src='images/12_meat.jpg' width='50px' height='50px' >
							</li>
						
						
							<li>
							<label for='fish'> Fruit  </label>
							<input type='Checkbox' name='fruit'  id='fruit' value='fruit' /> 
							<img src='images/9_fruit.jpg' width='50px' height='50px' >
							</li>
						
						<li>
							<label for='rice'> Drink  </label>
							<input type='Checkbox' name='drink'  id='drink' value='drink' /> 
							<img src='images/drink.png' width='50px' height='50px' >
						</li>
						</ul>
								<input type='submit' name='submit' value='Confirm' class='btn btn-primary btn-lg'>
						</fieldset>
					</form>";
		
	}		
	?>		
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="images/absent.jpg" alt=" " class="img-responsive" />
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="products.html"><img title=" " alt=" " src="images/5.png" width="90%" height="24%"/></a>		
															<p>Parryss-sugar</p>
															<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
															<h4 hidden="hidden">#3000.99 <span>#4500.00</span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
															<form action="#" method="post">
																<fieldset>
																	<input type="submit" name="Parryss_sugar" value="Select" class="button" />
																</fieldset>
															</form>
														</div>
													</div>
<?php

echo "$message_sugar";

?>
												</figure>
											</div>
										</div>
									</div>
								</div>
<?php

	if (isset($_POST['ofada'])) {
	$message_gold = "<form action='' method='post'>
						<fieldset>
						<ul>
							<li>
							<label for='meat'> Meat </label>
							<input type='Checkbox' name='meat'  id='meat' value='meat' /> 
							<img src='images/12_meat.jpg' width='50px' height='50px' >
							</li>
						
						
							<li>
							<label for='fish'> Fruit  </label>
							<input type='Checkbox' name='fruit'  id='fruit' value='fruit' /> 
							<img src='images/9_fruit.jpg' width='50px' height='50px' >
							</li>
						
						<li>
							<label for='rice'> Drink  </label>
							<input type='Checkbox' name='drink'  id='drink' value='drink' /> 
							<img src='images/drink.png' width='50px' height='50px' >
						</li>
						</ul>
								<input type='submit' name='submit' value='Confirm' class='btn btn-primary btn-lg'>
						</fieldset>
					</form>";
		
	}		
	?>		
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="images/available.jpg" alt=" " class="img-responsive" />
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block">
														<div class="snipcart-thumb">
															<a href="products.html"><img src="images/6.jpg" alt=" " class="img-responsive" width="90%" height="24%"/></a>
															<p>Ofada Rice</p>
															<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
															<h4 hidden="hidden">#8000.99 <span>#10500.00</span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
															<form action="#" method="post">
																<fieldset>
																	
																	<input type="submit" name="ofada" value="Select" class="button" />
																</fieldset>
															</form>
														</div>
													</div>
<?php

echo "$message_gold";

?>
												</figure>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>

	</body>
</html>