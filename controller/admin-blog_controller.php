<?php

session_start();

include('../model/connection.php');

if(!isset($_SESSION['logged_in'])){
    header('location: admin-login.php');
    exit;
}

if(isset($_POST['add_new_blog'])){
  $user_id = $_SESSION['user_id'];
  $user_name = $_SESSION['username'];
  $content = $_POST['content'];
  $title = $_POST['title'];
  $blog_overview = $_POST['blog_overview'];

  mysqli_query(
    $conn,
    "INSERT INTO blogs (user_id, username, content, title, BlogOverview) 
    VALUES ('$user_id', '$user_name', '$content', '$title', '$blog_overview')"
  );
}elseif(isset($_POST['delete_blog'])){
  $post_id = $_POST['post_id'];

  mysqli_query(
    $conn,
    "DELETE FROM blogs WHERE post_id = '$post_id'"
  );
}

$stmt = $conn->prepare("SELECT * FROM blogs ");
$stmt->execute();
$all_blogs = $stmt->get_result();

?>