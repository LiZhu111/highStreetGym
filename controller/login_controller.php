<?php

session_start();

include('../model/connection.php');

if(isset($_SESSION['customer_logged_in'])){
  header('location: ../index.php');
  exit;
}

if(isset($_POST['login_btn'])){
  $customer_name = $_POST['customer_name'];
  $customer_password = md5($_POST['customer_password']);

  $stmt = $conn->prepare(
      "SELECT customer_id, customer_name, customer_password FROM customers
      WHERE customer_name = ? AND customer_password = ? LIMIT 1;"
  );
  $stmt->bind_param('ss', $customer_name, $customer_password);
  if($stmt->execute()){
      $stmt->bind_result($customer_id, $customer_name, $customer_password);
      $stmt->store_result();

      if($stmt->num_rows() == 1){
          $stmt->fetch();

          $_SESSION['customer_id'] = $customer_id;
          $_SESSION['customer_name'] = $customer_name;
          $_SESSION['customer_logged_in'] = True;

          header('location: account.php?message=logged in successfully');
      }
      else{
          header('location: login.php?error=Could not verify your account');
      }
  }
  else{
      header('location: login.php?error=Can not login');
  }
}

?>