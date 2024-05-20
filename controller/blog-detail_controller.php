<?php

session_start();

include('../model/connection.php');

if(isset($_POST['add_comment'])){
  // add comments
  $comment = $_POST['comment'];
  $post_id = $_POST['post_id'];
  $user_id = $_SESSION['customer_id'];
  $user_name = $_SESSION['customer_name'];

  mysqli_query(
    $conn, 
    "INSERT INTO comments (post_id, user_id, username, content) VALUES ('$post_id', '$user_id', '$user_name', '$comment')"
  );
}

if(isset($_GET['post_id'])){
  // display the blog
  $post_id = $_GET['post_id'];
  $stmt = $conn->prepare("SELECT * FROM blogs WHERE post_id=?");
  $stmt->bind_param("i", $post_id);
  $stmt->execute();
  $post = $stmt->get_result();

  // display the comments
  $stmt_comment = $conn->prepare("SELECT * FROM comments WHERE post_id=?");
  $stmt_comment->bind_param("i", $post_id);
  $stmt_comment->execute();
  $comments = $stmt_comment->get_result();
}

?>