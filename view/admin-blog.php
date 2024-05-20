<?php
  include("../controller/admin-blog_controller.php")
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
      <?php while($row = $all_blogs->fetch_assoc()) { ?>
        <article  class="blog1">
          <h2 class="title"><?php echo $row['title']; ?></h2>
          <h3 class="meta">Published on <?php echo $row['timestamp']; ?>, by <?php echo $row['username']; ?></h3>
          <div class="blog overview.">
          <?php echo $row['BlogOverview']; ?>
          </div>
        </article>
          <button onclick="window.location.href='admin-blog-detail.php?post_id=<?php echo $row['post_id']; ?>'">Read now</button>
          <form action="admin-blog.php" method="post">
            <input type="hidden" name="post_id" value=<?php echo $row['post_id']; ?>>
              <button name="delete_blog">Delete</button>
          </form>
      <?php } ?>
        </section>   
    </main>
   <footer-component></footer-component>
</body>
</html>
