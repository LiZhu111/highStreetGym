<?php

session_start();

include('../model/connection.php');

if(!isset($_SESSION['logged_in'])){
    header('location: admin-login.php');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM class_detail");
$stmt->execute();
$all_users = $stmt->get_result();

if(isset($_POST['add_new_class'])){
  print_r($_POST['add_new_class']);
  $classname = $_POST['classname'];
  $trainername = $_POST['trainername'];
  $time = $_POST['time'];
  $weekday = $_POST['weekday'];
  $level = $_POST['level'];
  $duration = $_POST['duration'];
  $stock = $_POST['stock'];

  $stmt_add_class = $conn->prepare(
    "INSERT INTO class_detail (
        classname, trainername,level,weekday,time,duration,class_stock
        )
    VALUES (?, ?, ?, ?, ?, ?, ?)"
  );
  $stmt_add_class->bind_param(
    'sssssdd',
    $classname,
    $trainername,
    $level,
    $weekday,
    $time,
    $duration,
    $stock
  );
  if($stmt_add_class->execute()){
    header('location: classes.php?message=Classes added');
  }
}
elseif(isset($_POST['delete_class'])){
  $class_id = $_POST['class_id'];
  $stmt_remove = $conn->prepare(
    "DELETE FROM class_detail WHERE classdetail_id = ?"
  );
  $stmt_remove->bind_param('s', $class_id);
  if($stmt_remove->execute()){
    header('location: classes.php?message=class has been deleted');
}
}
  

?>