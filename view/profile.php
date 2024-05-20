<?php
  include("../controller/profile_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Profile</title>
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./components/admin_header.js" type="text/javascript" defer></script>
        <script src="./components/footer.js" type="text/javascript" defer></script>
    </head>
    <body>
      <admin_header-component></admin_header-component>
        <main class="service">
          <section id="layoutAuthentication" class="cta box">
            <div class="service-box top">
              <div class="top">
                <div class="box">
                  <h2><a href="../index.php">High Street Gym</a></h2>
                  <p>Hello <b><?php echo $res_Uname; ?></b>, Welcome</p>
                </div>
                <div class="box">
                  <p>Your email is <b><?php echo $res_Email; ?></b>.</p>
                </div>
              </div>
            </div>
          </section>
          <footer-component></footer-component>
        </main>
    </body>