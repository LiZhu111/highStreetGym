<?php
  include("../controller/admin-blog-detail_controller.php")
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>High Street Gym - Health and Fitness</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="./components/admin_header.js" type="text/javascript" defer></script>
		<script src="./components/footer.js" type="text/javascript" defer></script>
	</head>
	<body>
    <header>
      <admin_header-component></admin_header-component>
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
    <footer-component></footer-component>
</body>
</html>
