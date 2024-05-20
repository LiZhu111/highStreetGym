<?php
  include("../controller/blog_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>High Street Gym - Health and Fitness</title>
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
    <section id="layoutAuthentication" class="cta">
    <?php while($row = $all_blogs->fetch_assoc()) { ?>
      <article  class="blog1">
        <h2 class="title"><?php echo $row['title']; ?></h2>
        <h3 class="meta">Published on <?php echo $row['timestamp']; ?>, by <?php echo $row['username']; ?></h3>
        <div class="blog_overview.">
        <?php echo $row['BlogOverview']; ?>
        </div>
      </article>
        <button onclick="window.location.href='blog_detail.php?post_id=<?php echo $row['post_id']; ?>'">Read now</button>
    <?php } ?>
    <div class="card-footer text-center py-3">
            <h3>Adding new blog</h3>
            <form method='POST' action='admin-blog.php'>
              <div>
                <label for="inputProductName">Title</label>
                <input class="form-control" id="title" type="text" name='title' />  
              </div>
              <div>
                <label for="inputProductName">Blog Overview</label>
                <textarea class="form-control" id="blog_overview" type="text" name='blog_overview'></textarea>    
              </div>
              <div>
                <label for="inputProductName">Content</label>
                <textarea class="form-control" id="content" type="text" name='content'></textarea>  
              </div>
              <div class="mt-4 mb-0">
                <button type='submit' name='add_new_blog'>Add New Blog</button>
              </div>
            </form>
          </div>
    </section>
</body>
</html>
