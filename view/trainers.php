<?php
  include("../controller/trainers_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin trainers</title>
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
              <h3>Current trainers</h3>
              <thead>
                <tr>
                  <th scope="col">Trainer name</th>
                  <th scope="col">Image</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = $all_users->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $row['trainername']; ?></td>
                  <td><img src=<?php echo $row['image_url']; ?>></td>
                </tr>
                <?php } ?>
              </tbody>
        </table>  
        <form action='trainers.php' method='post' enctype='multipart/form-data'>
              <strong>Select File</strong>
              <input type='file' name='xmlfile' required>
              <input type='submit' value='Upload'>
            </form>
      </section>
    </main>
   <footer-component></footer-component>
</body>
</html>
