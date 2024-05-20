<?php

session_start();
include('../model/connection.php');

if(!isset($_SESSION['customer_logged_in'])){
    header('location: login.php');
    exit;
}

if(isset($_POST['book_class'])){
  $customer_id = $_SESSION['customer_id'];
  $classdetail_id = $_POST['classdetail_id'];
  
  mysqli_query(
    $conn,
    "INSERT INTO classbookings (customer_id, classdetail_id) VALUES ('$customer_id', '$classdetail_id')"
  );

  mysqli_query(
    $conn,
    "UPDATE class_detail set class_stock=class_stock - 1 WHERE classdetail_id='$classdetail_id'"
  );
}

if(isset($_GET['class_id'])){
    $class_id = $_GET['class_id'];
    $stmt = $conn->prepare("SELECT * FROM classes WHERE class_id=?");
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $class = $stmt->get_result();

    $stmt = $conn->prepare("SELECT * FROM class_detail WHERE class_id=?");
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $class_detail = $stmt->get_result();

}else{
    header('location: services.php');
}
?>