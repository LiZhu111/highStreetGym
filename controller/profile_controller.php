<?php 
   session_start();

   include('../model/connection.php');
   if(!isset($_SESSION['logged_in'])){
    header('location: admin-login.php');
    exit;
   }

  $id = $_SESSION['user_id'];
  $query = mysqli_query($conn,"SELECT*FROM users WHERE user_id=$id");
  while($result = mysqli_fetch_assoc($query)){
    $res_Uname = $result['username'];
    $res_Email = $result['email'];
    $res_id = $result['user_id'];
}
?>