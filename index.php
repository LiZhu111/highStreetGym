<?php
  include("./controller/index_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>High Street Gym - Health and Fitness</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./view/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="./view/components/footer.js" type="text/javascript" defer></script>
	</head>
	<body>
	  <header>
        <nav id="hamnav">
          <h1><a href="./index.php">High Street Gym</a></h1>
          <!-- (B) THE HAMBURGER -->
          <label for="hamburger">&#9776;</label>
          <input type="checkbox" id="hamburger">
        <div id="hamitems">
          <ul>
            <li><a href="./index.php">Home</a></li>
			      <li><a href="./view/services.php">Services</a></li>
			      <li><a href="./view/about_us.php">About us</a></li>
			      <li><a href="./view/blog.php">Blog</a></li>
				  <li><a href="./view/account.php">Account</a></li>
          </ul>
        </div>
        <div class="container">
		    <?php if(isset($_SESSION['customer_logged_in'])){ ?>
				<button onclick="window.location.href='./model/logout.php'">Log Out</button>
		    <?php }else{ ?>
				<button onclick="window.location.href='./view/login.php'">Customer login</button>
            <?php } ?>
            <button onclick="window.location.href='./view/admin-login.php'">Admin login</button>
        </div>
        </nav>
      </header>
        <main>
			<section class="welcome-message">
				<h1>
					Welcome to High Street Gym</h1>
				<p>
				We train athletes - professional, collegiate, youth, and anybody that wants to train like an athlete.
				Whether your goal is weight loss, body building, nutrition or diet improvements, having more energy, or just looking and feeling better
				- <span class="large">we're here for you!</span>
			    </p>
                <button onclick="window.location.href='./view/register.php'">Join now</button>
            </section>
			<aside class="we"> 
			<div class="we1">
				<h2>WE ARE OPEN!</h2>
			    <p>
			    <span class="large red">We are open 24:7. </span>YOU can now train any time you like, weekdays, weekends & public holidays.  </p>
			</div>
			<div class="we2">
			    <img src="https://cdn.pixabay.com/photo/2016/10/11/01/58/woman-1730325_960_720.jpg" alt="fitness coach" style="width:auto; height:200px; padding:20px 200px 0 0;"> 
			</div>
			</aside>
			<section class="classes">
				<h1>Services and Facilities</h1>
				<p>High Street Gym offers cutting edge exercise options, including group fitness classes and one-on-one personal training sessions for weight loss, circuit training, boxing and karate. Our trainers are all Les Mills accredited instructors and are second to none – all have Bachelor Degrees in Human Movements. We have created gyms that we would love to train in and share that passion and enthusiasm with our valued members. Our gyms have an old school feel with a new school attitude!</p>
				<div class="wrapper">
				  <div class="wrapper1">
					<img src="https://cdn.pixabay.com/photo/2021/01/05/18/13/woman-5892067_960_720.jpg" alt="Boxing">
				    <p>Boxing</p>
				  </div>
				  <div class="wrapper1">
                    <img src="https://images.pexels.com/photos/3775566/pexels-photo-3775566.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Pilates">
				   <p>Pilates</p>
				  </div>  
				</div>
				<div class="wrapper">
                  <div class="wrapper1">
				    <img src="https://images.pexels.com/photos/2294363/pexels-photo-2294363.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Abs">
				    <p>Abs</p>
				  </div>
				  <div class="wrapper1">
				    <img src="https://cdn.pixabay.com/photo/2017/04/22/10/15/woman-2250970_960_720.jpg" alt="HIIT">
                    <p>HIIT or high-intensity interval training</p>
				  </div>
			    </div>
				<div class="more_class">
				    <button onclick="window.location.href='./view/services.php'">
				    More classes
			       </button>
			    </div>
            </section>
		</main>
		<footer-component></footer-component>
	</body>
</html>