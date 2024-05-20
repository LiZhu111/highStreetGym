<?php
  include("../controller/classes_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin classes</title>
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
              <h3>Current classes</h3>
              <thead>
                <tr>
                  <th scope="col">Classname</th>
                  <th scope="col">Trainername</th>
                  <th scope="col">Time</th>
                  <th scope="col">Weekday</th>
                  <th scope="col">Level</th>
                  <th scope="col">Duration (minutes)</th>
                  <th scope="col">Stock</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = $all_users->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $row['classname']; ?></td>
                  <td><?php echo $row['trainername']; ?></td>
                  <td><?php echo $row['time']; ?></td>
                  <td><?php echo $row['weekday']; ?></td>
                  <td><?php echo $row['level']; ?></td>
                  <td><?php echo $row['duration']; ?></td>
                  <td><?php echo $row['class_stock']; ?></td>
                  <form class='action-buttons' method='POST' action='classes.php'>
                    <td>
                      <input type='hidden' name='class_id' value='<?php echo $row['classdetail_id']; ?>'/>
                      <input type='submit' style='background-color: #4CAF50; color: white; border: none;' class='btn btn-sm' name='delete_class' value='Delete'/>
                    </td>
                  </form> 
                </tr>
                <?php } ?>
              </tbody>
             </div>
          </table>  
          <div class="card-footer text-center py-3">
            <h3>Adding new classes</h3>
            <form method='POST' action='classes.php'>
              <div>
                <label for="inputProductName">Classname</label>
                <input class="form-control" id="classname" type="text" name='classname' />  
              </div>
              <div>
                <label for="inputTrainerName">Trainername</label>
                <input class="form-control" id="trainername" type="text" name='trainername' />  
              </div>
              <div>
                <label for="inputProductName">Time</label>
                <input class="form-control" id="time" type="text" name='time' />  
              </div>
              <div>
                <label for="inputProductName">Weekday</label>
                <input class="form-control" id="weekday" type="text" name='weekday' />  
              </div>
              <div>
                <label for="inputProductName">Level</label>
                <input class="form-control" id="level" type="text" name='level' />  
              </div>
              <div>
                <label for="inputProductName">Duration</label>
                <input class="form-control" id="duration" type="text" name='duration' />  
              </div>
              <div>
                <label for="inputProductName">Stock</label>
                <input class="form-control" id="stock" type="text" name='stock' />  
              </div>
              <div class="mt-4 mb-0">
                <div class="d-grid"><input type='submit' class="btn btn-dark btn-block" name='add_new_class' value='Add New Class'/></div>
              </div>
            </form>
          </div>
        </section>   
      </main>
      <footer-component></footer-component>
    </body>
   </html>