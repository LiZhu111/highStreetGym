<?php
  include("../controller/customers_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin customers</title>
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./components/admin_header.js" type="text/javascript" defer></script>
        <script src="./components/footer.js" type="text/javascript" defer></script>
    </head>
<body>
    <header>
      <admin_header-component></admin_header-component>
    </header>
    <main>
      <section id="layoutAuthentication" class="cta box">
        <table class='table table-hover'>
            <p style='color:red;'><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
            <div class="mb-3">
              <h3>Current customers</h3>
              <thead>
                <tr>
                  <th scope="col">Customer name</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = $all_users->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $row['customer_name']; ?></td>
                  <td><?php echo $row['customer_email']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
        </table> 
      </section>
    </main>
   <footer-component></footer-component>
</body>
</html>
