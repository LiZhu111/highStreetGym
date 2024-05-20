<?php
  include("../controller/register_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./components/header.js" type="text/javascript" defer></script>
        <script src="./components/footer.js" type="text/javascript" defer></script>
    </head>
    <body>
      <header-component></header-component>
      <section id="layoutAuthentication" class="cta">
          <h2><a href="../index.php">High Street Gym</a></h2>
          <div class="container">
            <h2 class="header">Create an Account</h2>
            <div class="card-body">
              <form id=form action='register.php' method='POST'>
                <p style="color:red"><?php if(isset($_GET['error'])){echo $_GET['error']; }?></p>
				        <div class="info">
				          <label for="customer_name" class="mobile-hide">Userame:</label>
				          <div class="input-icons">
					        <input type="text" id="customer_name" name="customer_name"  maxlength="10" class="input-field" required>
				          </div>
				        </div>
                <div class="info">
				          <label for="customer_email" class="mobile-hide">Email:</label>
				          <div class="input-icons">
					        <input type="text" id="customer_email" name="customer_email"  maxlength="20" class="input-field" required>
				          </div>
				        </div>
                <div class="info">
				          <label for="customer_password" class="mobile-hide">Password:</label>
				          <div class="input-icons">
				          <input type="customer_password" id="customer_password" name="customer_password"  maxlength="20" minleghth="6" class="input-field" required>
				          </div>
				        </div>
                <div class="submit">
				          <input type="submit" name="register" value="Create an account">
			          </div>
                <div class="info">
                  Have an account? <a href="./login.php">Go to Login</a>
                </div>
              </form>
            </div>
          </div>  
      </section>
      <footer-component></footer-component>
    </body>
</html>
