<?php
  include("../controller/book_controller.php")
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

      <h2>Gym Class Booking Form</h2>
        <section class="cta">
        <?php while($row = $class->fetch_assoc()){ ?>
	      <h3>Book your <?php echo $row['classname']; ?> class here!</h3> 
        <?php } ?>
        <table style="margin-left: auto; margin-right: auto;">
          <thead>
            <tr>
            <th>Class Name</th>
            <th>Trainer Name</th>
            <th>Time</th>
            <th>Weekday</th>
            <th>Level</th>
            <th>Duration (minutes)</th>
            <th>Stock</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
          
          <?php while($row = $class_detail->fetch_assoc()){ ?>
            <tr>
            <td><?php echo $row['classname']; ?></td>
            <td><?php echo $row['trainername']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><?php echo $row['weekday']; ?></td>
            <td><?php echo $row['level']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><?php echo $row['class_stock']; ?></td>
            <?php if($row['class_stock'] > 0){ ?>
              <form action="book.php?class_id=<?php echo $class_id; ?>" method="post">
                <input type="hidden" name="classdetail_id" value=<?php echo $row['classdetail_id']; ?>>
                  <td><button class="book-button" name="book_class">Book</button></td>
              </form>
            <?php } ?>
            </tr>
          <?php } ?>
          
          </tbody>
        </table>
	  </section>
      </main>
    <footer-component></footer-component>
  </body>
 </html>