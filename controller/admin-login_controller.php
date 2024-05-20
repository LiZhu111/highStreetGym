<?php

session_start();

include('../model/connection.php');

if(isset($_SESSION['logged_in'])){
  header('location: profile.php');
  exit;
}

if(isset($_POST['login_btn'])){
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare(
      "SELECT user_id, username, password, user_role FROM users
      WHERE username = ? AND password = ? LIMIT 1;"
  );
  $stmt->bind_param('ss', $username, $password);
  if($stmt->execute()){
      $stmt->bind_result($user_id, $username, $password, $user_role);
      $stmt->store_result();

      if($stmt->num_rows() == 1){
          $stmt->fetch();

          $_SESSION['user_id'] = $user_id;
          $_SESSION['username'] = $username;
          $_SESSION['user_role'] = $user_role;
          $_SESSION['logged_in'] = True;

          header('location: profile.php?message=logged in successfully');
      }
      else{
          header('location: admin-login.php?error=Could not verify your account');
      }
  }
  else{
      header('location: admin-login.php?error=Can not login');
  }
}

?>