<?php
  include("../controller/admin-comment_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members' Blog</title>
    <link href="css//style.css" rel="stylesheet" />
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
              <h3>Current comments</h3>
              <div>
                <p><a href="./admin-blog.php">Back to Blogs</p>
              </div>
              <thead>
                <tr>
                  <th scope="col">Username</th>
                  <th scope="col">Timestamp</th>
                  <th scope="col">Content</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = $all_users->fetch_assoc()) { 
                  $stmt = $conn->prepare("SELECT * FROM comments ");
                  $stmt->execute();
                  $all_users = $stmt->get_result();
                  ?>
                <tr>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['timestamp']; ?></td>
                  <td><?php echo $row['content']; ?></td>
                  <form class='action-buttons' method='POST' action='admin-comment.php'>
                    <td>
                      <input type='hidden' name='comment_id' value='<?php echo $row['comments']; ?>'/>
                      <input type='submit' style='background-color: #4CAF50; color: white; border: none;' class='btn btn-sm' name='update_comment' value='Update'/>
                      <input type='submit' style='background-color: #4CAF50; color: white; border: none;' class='btn btn-sm' name='delete_comment' value='Delete'/>
                    </td>
                  </form> 
                </tr>
                <?php } ?>
              </tbody>
             </div>
          </table>  
          <div class="card-footer text-center py-3">
            <h3>Adding new comment</h3>
            <form method='POST' action='admin-comment.php'>
              <div>
                <label for="inputuserName">Username</label>
                <input class="form-control" id="username" type="text" name='username' />  
              </div>
              <div>
                <label for="inputcommenttime">Time</label>
                <input class="form-control" id="timestamp" type="text" name='timestamp' />  
              </div>
              <div>
                <label for="inputcontent">Content</label>
                <input class="form-control" id="content" type="text" name='content' style='hight:100px'  />  
              </div>
              <div class="mt-4 mb-0">
                <div class="d-grid"><input type='submit' class="btn btn-dark btn-block" name='add_new_comment' value='Add New comment'/></div>
              </div>
            </form>
          </div>
        </section>   
        <footer-component></footer-component>
</body>
</html>
