<?php

session_start();

include('../model/connection.php');


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>About Us |High Street Gym</title>
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
    <section class="welcome-message">
		    <h1>About Us</h1>
        <p>We train athletes – professional, collegiate, youth, and anybody that wants to train like an athlete. When we speak of training we are talking about speed, strength, power, and sports therapy.
            Our business is aimed at a health conscience adult who wants to move beyond the usual local gym.</p>
      </section>
      <section class="trainer">
        <h2>Meet Our Team</h2>
        <p>Our trainers are all Les Mills accredited instructors and are second to none – all have Bachelor Degrees in Human Movements. 
        </p>
        <div class="wrapper">
          <?php include('../model/fetch_trainers.php'); ?>
          <?php while($row = $all_trainers->fetch_assoc()){ ?>
			<div class="wrapper1">
				<img src=<?php echo $row['image_url']; ?> alt=<?php echo $row['trainername']; ?> />
				    <p><?php echo $row['trainername']; ?></p>
			</div>
          <?php } ?>
		</div>
      </section>
      <section class="history">
        <h2>Our History and Background</h2>
        <p>We are a family operated business that has little to do with the rest of the fitness industry.
            Our gym world does not include the annoying telemarketers or membership consultants. 
            Our gyms speak for themselves, our members do our marketing. 
            We believe that word of mouth has way more credibility than something that a marketing machine dreams up.
            You are always welcome to look through any of our gyms at your own pace, with no pressure whatsoever. 
            With hard-selling 'health club' sales consultants hustling you on every corner, we pride ourselves on being a refreshing change from that. 
            Our 'no obligation, no pressure' attitude is clearly evident with our $10 CASUAL visit rate.
            We have created gyms that we would love to train in and share that passion and enthusiasm with our valued members. 
            Our gyms have an old school feel with a new school attitude!.</p>
      </section>
    </main>
    <footer-component></footer-component>
    </body>
 </html>   