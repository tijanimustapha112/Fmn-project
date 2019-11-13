
<?php
	include 'header.php';
 ?>
	<section id="main-slider" class="no-margin">
        <div class="carousel slide">      
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">Computerise <span>Attendance</span></h2>
                                    <h6><?php echo "$actual_date $actual_time"; ?></h6>
                                    <p class="animation animated-item-2">This is a web application that is build to help calculate the attendance of the canteen</p>
                                    <a class="btn-slide animation animated-item-3" href="about.php">Read More</a>
                                    <form action="" method="POST">
                                      
                                      <input type='submit' class="btn-slide animation animated-item-3" name='setup' value="Setup Table"></input>  

                                    </form>
                                    
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                	<marquee direction='left'>
                                   <p>
                                   	<img src="images/slider/img3.jpeg" width="100%" height="100%"class="img-responsive">
                                   	<img src="images/slider/img4.jpeg" alt="img" width="100%" height="100%">
                                   </p>     
                                </marquee>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->             
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <?php

        include 'footer.php';
        

    ?>
    </section><!--/#main-slider-->
	<?php
        
        
        
        if (isset($_POST['setup'])) {
            mysql_connect('localhost','root','') or die(mysql_error());
            $select_db = mysql_select_db('canteen attendance');
             if ($select_db) {
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
                    
            }
            if ($result) {
                 echo '<script>
                                    alert("Table Created Successfully!");
                                    window.location = "./index.php";
                                </script>';
            }
            else{
               echo '<script>
                                    alert("Unable to create table or table has being created before now");
                                    window.location = "./index.php";
                                </script>';
            }
        }
           

     ?>
     <div bgcolor='red'>
         
     </div>
	
<!-- footer-->
	
	
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
