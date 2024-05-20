<?php
  session_start();
  
  include("../controller/services_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Services</title>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="./components/header.js" type="text/javascript" defer></script>
		<script src="./components/footer.js" type="text/javascript" defer></script>
  </head>
  <body>
  <header>
        <nav id="hamnav">
          <h1><a href="../index.php">High Street Gym</a></h1>
          <!-- (B) THE HAMBURGER -->
          <label for="hamburger">&#9776;</label>
          <input type="checkbox" id="hamburger">
        <div id="hamitems">
          <ul>
            <li><a href="../index.php">Home</a></li>
			      <li><a href="./services.php">Services</a></li>
			      <li><a href="./about_us.php">About us</a></li>
			      <li><a href="./blog.php">Blog</a></li>
				  <li><a href="./account.php">Account</a></li>
          </ul>
        </div>
        <div class="container">
		    <?php if(isset($_SESSION['customer_logged_in'])){ ?>
				<button onclick="window.location.href='../model/logout.php'">Log Out</button>
		    <?php }else{ ?>
				<button onclick="window.location.href='./login.php'">Customer login</button>
            <?php } ?>
            <button onclick="window.location.href='./admin-login.php'">Admin login</button>
        </div>
        </nav>
      </header>
	<main>
	  <section>
	    <h2>Gym Classes</h2>
	    <div class="grid-container">
          <?php include('../model/fetch_classes.php'); ?>
          <?php while($row = $all_classes->fetch_assoc()){ ?>
            <div class="grid-item">
            <h3><?php echo $row['classname']; ?></h3>
            <p><?php echo $row['description']; ?></p>
			<p class="price">$<?php echo $row['Price']; ?> per class</p>
			<button onclick="window.location.href='book.php?class_id=<?php echo $row['class_id']; ?>'" class="button">Book now</button>
			</div>
          <?php } ?>
        </div>
	  </section>
	  <section class="classes-timetable spad">
	    <div class="container">
		  <div class="row">
		    <div class="col-lg-12">
		      <div class="section-title">
		        <h2>Class Timetable</h2>
		      </div>
		    </div>
		   </div>
		<div class="row">
		  <div class="col-lg-12">
		    <div class="schedule-table">
				<?php echo build_timetable(); ?>
	      </div>
		</div>
	    </div>
	    </div>
      </section>
	</main>
    <footer-component></footer-component>
  </body>
 </html>