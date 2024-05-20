<?php
  include("../controller/blog-detail_controller.php")
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
    <?php while($row = $post->fetch_assoc()) { ?>
      <article  class="blog">
        <h2 class="title"> <?php echo $row['title']; ?></h2>
        <h3 class="meta">Published on <?php echo $row['timestamp']; ?>, by <?php echo $row['username']; ?></h3>
        <div class="content">
        <?php echo $row['content']; ?>
        </div>
      </article>
    <?php } ?>
      <br>
    
    <h3>Comments:</h3>
    <?php while($row = $comments->fetch_assoc()) { ?>
      <article  class="comment">
        <h4 class="title">Published on <?php echo $row['timestamp']; ?> by <?php echo $row['username']; ?></h4>
        <p><?php echo $row['content']; ?></p>
      </article>
    <?php } ?>
      
    <?php if(isset($_SESSION['customer_logged_in'])){ ?>
      <div class="blog-post">
        <form action="blog_detail.php?post_id=<?php echo $post_id; ?>" method="post">
          <input type="hidden" name="post_id" value=<?php echo $post_id; ?>>
          <label for="comment">Leave a Comment:</label>
          <textarea id="comment" name="comment" placeholder="Write your comment here..."></textarea>
          <br>
          <button type="submit" name="add_comment">Post Comment</button>
        </form>
      </div>
    <?php } ?>
    </section>
</body>
</html>
