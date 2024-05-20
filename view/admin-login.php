<?php
  include("../controller/admin-login_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./components/admin_header.js" type="text/javascript" defer></script>
        <script src="./components/footer.js" type="text/javascript" defer></script>
    </head>
    <body>
    <header>
      <nav id="hamnav">
      <h1><a href="./profile.php">Admin Portal</a></h1>
        <div id="hamitems">
        <ul>
          <li><a href="./profile.php">Profile</a></li>
          <li><a href="./classes.php">Classes</a></li>
          <li><a href="./users.php">Users</a></li>
          <li><a href="./trainers.php">Trainers</a></li>
          <li><a href="./customers.php">Customers</a></li>
          <li><a href="./admin-blog.php">Blogs</a></li>
        </ul>    
      </div>
      <div><a href="./admin-login.php"><button class="btn">Log in</button></a></div>
    </nav>
    </header>
      <section id="layoutAuthentication" class="cta box">
          <h2><a href="../index.php">High Street Gym</a></h2>
          <div class="container">
            <h2 class="header">Admin Login</h2>
            <div class="card-body">
              <form id=form action='admin-login.php' method='POST'>
                <p style="color:red"><?php if(isset($_GET['error'])){echo $_GET['error']; }?></p>
				        <div class="info">
				          <label for="username" class="mobile-hide">Username:</label>
				          <div class="input-icons">
					          <input type="text" id="username" name="username"  maxlength="10" class="input-field" required >
				          </div>
				        </div>
				        <div class="info">
				          <label for="password" class="mobile-hide">Password:</label>
				          <div class="input-icons">
				          <input type="password" id="password" name="password"  maxlength="20" minleghth="6" class="input-field" required>
				        </div>
                <div class="submit">
				         <input type="submit" name='login_btn' value="Log in">
			          </div>
                <div class="info">
                  Don't have an account? <a href="admin-register.php">Sign Up Now</a>
                </div>
              </form>
            </div>
          </div>  
      </section>
      <footer-component></footer-component>
    </body>
</html>
