<?php
  include("../controller/account_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Account</title>
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
      <section id="layoutAuthentication" class="cta box">
        <div class="info">
              <h2><a href="../index.php">High Street Gym</a></h2>
              <p>My account</p>
            <div>
                <div>
                  <p>Hello <?php echo $res_Uname ?></b>, Welcome</p>
                </div>
                <div>
                  <p>Your email is <b><?php echo $res_Email; ?></b>.</p>
                </div>  
                <?php $booked_class_num = mysqli_num_rows($booked_class);
                      if($booked_class_num > 0) { ?>
                <div>
                  <p>Class order: </p>
                  <table style="margin-left: auto; margin-right: auto;">
                    <thead>
                      <tr>
                      <th>Class Name</th>
                      <th>Trainer Name</th>
                      <th>Time</th>
                      <th>Weekday</th>
                      <th>Level</th>
                      <th>Duration (minutes)</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php while($row = $booked_class->fetch_assoc()){ ?>
                      <tr>
                      <td><?php echo $row['classname']; ?></td>
                      <td><?php echo $row['trainername']; ?></td>
                      <td><?php echo $row['time']; ?></td>
                      <td><?php echo $row['weekday']; ?></td>
                      <td><?php echo $row['level']; ?></td>
                      <td><?php echo $row['duration']; ?></td>
                      </tr>
                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
                <?php } ?>
                <div><a href="../model/logout.php"><button class="btn">Log Out</button></a>
            </div>
        </div>
     </section>
     </main>
     <footer-component></footer-component>
    </body>